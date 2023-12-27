<?php

        require("../app/controllers/Insurer.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen bg-gray-200">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white w-56 min-h-screen" id="sidebar">
        <div class="p-4">
            <h1 class="text-2xl font-semibold">Insurance System</h1>
            <ul class="mt-4">
                <li class="mb-2"><a href="insurer.php" class="block hover:text-indigo-400">Insurer</a></li>
                <li class="mb-2"><a href="client.php" class="block hover:text-indigo-400">Client</a></li>
                <li class="mb-2"><a href="article.php" class="block hover:text-indigo-400">Article</a></li>
                <li class="mb-2"><a href="claim.php" class="block hover:text-indigo-400">Claim</a></li>
                <li class="mb-2"><a href="premium.php" class="block hover:text-indigo-400">Premium</a></li>
            </ul>
        </div>
    </div>

    <!-- Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Navbar -->
        <div class="bg-white shadow">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-4 px-2">
                    <h1 class="text-xl font-semibold">Insurance Management System</h1>
                </div>
            </div>
        </div>

        <!-- Content Body -->
        <div class="flex-1 overflow-auto p-4">
            <h1 class="text-3xl font-bold mb-8">Manage Insurers</h1>

            <!-- Add Insurer Form -->
            <form action="../app/controllers/Insurer.php" method="post" class="mb-8">
                <input type="hidden" name="action" value="addInsurer">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter name" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" placeholder="Enter address" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                    </div>
                </div>
                <button type="submit" name="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
            </form>

            <!-- Insurers Table -->
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Address</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($insurers as $insurer): ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?= $insurer['id'] ?></td>
                        <td class="py-2 px-4 border-b"><?= $insurer['name'] ?></td>
                        <td class="py-2 px-4 border-b"><?= $insurer['address'] ?></td>
                        <td class="py-2 px-4 border-b">
                            <form action="../app/controllers/Insurer.php" method="post" class="ml-2">
                                <input type="hidden" name="delete_id" value="<?= $insurer['id'] ?>">
                                <input type="hidden" name="action" value="deleteInsurer">
                                <button type="submit" name="delete" class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                            </form>
                            <button class="bg-yellow-500 text-white py-1 px-2 rounded-md" onclick="toggleEditForm(<?= $insurer['id'] ?>)">Edit</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Edit Insurer Form -->
            <?php foreach ($insurers as $insurer): ?>
                <form action="../app/controllers/Insurer.php" method="post" class="flex items-center space-x-2 mt-4" id="editForm<?= $insurer['id'] ?>" style="display: none;">
                    <input type="hidden" name="action" value="editInsurer">
                    <input type="hidden" name="id" value="<?= $insurer['id'] ?>">
                    <input type="text" name="name" value="<?= $insurer['name'] ?>" class="p-1 border border-gray-300 rounded-md">
                    <input type="text" name="address" value="<?= $insurer['address'] ?>" class="p-1 border border-gray-300 rounded-md">
                    <button type="submit" name="edit" class="bg-green-500 text-white py-1 px-2 rounded-md hover:bg-green-600" onclick="return confirm('Are you sure you want to edit this insurer?')">Edit</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    function toggleEditForm(insurerId) {
        const editForm = document.getElementById(`editForm${insurerId}`);
        const currentDisplay = editForm.style.display;
        editForm.style.display = currentDisplay === 'block' ? 'none' : 'block';
    }
</script>

</body>
</html>
