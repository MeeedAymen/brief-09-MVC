<?php

    require("../app/controllers/Article.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="bg-gray-100">

<div class="h-screen flex  bg-gray-200">
        <!-- Sidebar -->
        <div class=" bg-gray-800 text-white w-56 min-h-screen"
            id="sidebar">
            <!-- Your Sidebar Content -->
            <div class="p-4">
                <h1 class="text-2xl font-semibold">Sidebar</h1>
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
                        <h1 class="text-xl font-semibold">Animated Drawer</h1>
                    </div>
                </div>
            </div>
            <!-- Content Body -->
            <div class="flex-1 overflow-auto p-4">
    <h1 class="text-3xl font-bold mb-8">Welcome to our website</h1>

    <form action="../app/controllers/Article.php" method="post" class="mb-8">
        <input type="hidden" name="action" value="addArticle">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">title</label>
                <input type="text" name="title" id="title" placeholder="Enter title" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <label for="content" class="block text-sm font-medium text-gray-700">content</label>
                <input type="text" name="content" id="content" placeholder="Enter content" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <label for="date" class="block text-sm font-medium text-gray-700">date</label>
                <input type="text" name="date" id="date" placeholder="Enter date" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <label for="insurer_id" class="block text-sm font-medium text-gray-700">insurer_id</label>
                <input type="text" name="insurer_id" id="insurer_id" placeholder="Enter insurer_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
                <label for="client_id" class="block text-sm font-medium text-gray-700">client_id</label>
                <input type="text" name="client_id" id="client_id" placeholder="Enter client_id" class="mt-1 p-2 border border-gray-300 rounded-md w-full">
            </div>
            <!-- Repeat similar structure for other input fields -->
        </div>
        <button type="submit" name="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
    </form>

    <br>

    <table class="min-w-full bg-white border border-gray-300 rounded-md">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">title</th>
                <th class="py-2 px-4 border-b">content</th>
                <th class="py-2 px-4 border-b">date</th>
                <th class="py-2 px-4 border-b">insurer_id</th>
                <th class="py-2 px-4 border-b">client_id</th>
                <!-- Repeat for other headers -->
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?= $article['id'] ?></td>
                    <td class="py-2 px-4 border-b"><?=$article['title']?></td>
                    <td class="py-2 px-4 border-b"><?=$article['content']?></td>
                    <td class="py-2 px-4 border-b"><?=$article['date']?></td>
                    <td class="py-2 px-4 border-b"><?=$article['insurer_id']?></td>
                    <td class="py-2 px-4 border-b"><?=$article['client_id']?></td>

                    <!-- Repeat for other data fields -->
                    <td class="py-2 px-4 border-b">

                        <form action="../app/controllers/Article.php" method="post" class="ml-2">
                            <input type="hidden" name="delete_id" value="<?= $article['id'] ?>">
                            <input type="hidden" name="action" value="deleteArticle">
                            <button type="submit" name="delete" class="bg-red-500 text-white py-1 px-2 rounded-md hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
        </div>
    </div>


<form action="" method="post" class="flex items-center space-x-2">
    <input type="hidden" name="action" value="editArticle">
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <input type="text" name="title" value="<?= $article['title'] ?>" class="p-1 border border-gray-300 rounded-md">
    <input type="text" name="content" value="<?= $article['content'] ?>" class="p-1 border border-gray-300 rounded-md">
    <input type="text" name="date" value="<?= $article['date'] ?>" class="p-1 border border-gray-300 rounded-md">
    <input type="text" name="insurer_id" value="<?= $article['insurer_id'] ?>" class="p-1 border border-gray-300 rounded-md">
    <input type="text" name="client_id" value="<?= $article['client_id'] ?>" class="p-1 border border-gray-300 rounded-md">
    <!-- Repeat for other input fields -->
    <button type="submit" name="edit" class="bg-green-500 text-white py-1 px-2 rounded-md hover:bg-green-600" onclick="return confirm('Are you sure you want to edit this address?')">Edit</button>
</form>

</div>
</body>
</html>

