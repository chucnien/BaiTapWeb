<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Ckeditor 4.1</title>
    <script type="text/javascript" src="./ckeditor_4.19.1_full/ckeditor/ckeditor.js"></script>
</head>

<body>
    <form action="_posteddata.php" method="post">
        <textarea name="tomtat" cols="" rows=""></textarea>
        <script type="text/javascript">
            CKEDITOR.replace('tomtat');
        </script>
        <input name="ok" type="submit" value="Ok" />
    </form>
</body>

</html>