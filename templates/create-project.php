<html>
    <head>
        <title>Create project</title>
    </head>
    <body>

        <form action="/create" method="post">
            <fieldset>
                <label>Project name</label>
                <input type="text" name="name" /> 
            </fieldset> 
            <fieldset>
                <label>Description</label>
                <textarea name="description" ></textarea>
            </fieldset>
            
            <input type="submit" value="Create" />
        </form>

    </body>
</html>