


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Email Scraper</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            animation: gradient 10s ease infinite;
            background-color: dimgray;
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
        }
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px #ddd;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
            margin-bottom: 10px;
        }
    
        input[type="text"]:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: inset 0 1px 3px #ddd, 0 0 8px #4CAF50;
        }

        #submit {
            background-color: #4CAF50;
            color: white;
            padding: 8px 13px;
            font-size: 13px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            maring-left: 50px;
        }

        #submit:hover {
            background-color: #fff;
            transition: 1s;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

/*         #results-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background-color: #f2f2f2;
        } */

        #results {

            display: grid;
            justify-content: center;
            align-items: center;


            max-width: 600px;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);

        }
    </style>
</head>
<body>
    <div id="container">
    <h1>Email Scraper</h1>
    <form>
        <label for="url">Enter URL:</label>
        <input type="text" id="url" name="url">
        <button type="button" id="submit">Scrape Emails</button>
    </form>
    </div>
    <div id="results-container">
        <div id="results"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                $.ajax({
                    type: 'POST',
                    url: 'email_scraper.php',
                    data: { url: $('#url').val() },
                    success: function(response) {
                        var emails = JSON.parse(response);
                        var results = '';
                        if (emails.length > 0) {
                            results = '<ul>';
                            emails.forEach(function(email) {
                                results += '<li>' + email + '</li>';
                            });
                            results += '</ul>';
                        } else {
                            results = '<p>No emails found.</p>';
                        }
                        $('#results').html(results);
                    },
                    error: function() {
                        $('#results').html('<p>An error occurred.</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
