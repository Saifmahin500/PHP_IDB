<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>same page form process</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        USER NAME : <br>
        <input type="text" name="user" size="20" id=""><br>

        book in collection : <br>
        <select name="book[]" size="5" multiple id="">
            <option> Web Application Development</option>
            <option> Linux Network Development</option>
            <option> xml</option>
            <option> laravel</option>
            <option> MERN Stack</option>
        </select><br>
        Comment: <br>
        <textarea name="comment" cols="50" rows="2" id=""></textarea><br>
        <input type="submit" name="submit" value="send">
    </form>

    <?php 
    if($_POST)
    {
        print "<P>Welcome <b>$_POST[user]</b></p>";
        print "<P>here is your comment : <i>$_POST[comment]</i></p>";

        print "<ol>";

        foreach($_POST["book"] as $book)
        {
            print "<li>$book</li>";
        }
         print "</ol>";
    }


    ?>
</body>
</html>