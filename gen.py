import os


def generate_index_html(root_directory):
    html_content = """
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index of Files and Folders</title>
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            ul { list-style-type: none; padding-left: 0; }
            li { margin: 5px 0; }
            a { text-decoration: none; color: #0366d6; }
            a:hover { text-decoration: underline; }
        </style>
    </head>
    <body>
        <h1>Index of Files and Folders</h1>
        <ul>
    """

    # Walk through the directory
    for root, _, files in os.walk(root_directory):
        for file in files:
            if file == "index.html":
                continue
            # Only include .html, .css, and .js files
            if file.endswith((".html", ".css", ".js")):
                file_path = os.path.join(root, file)
                rel_path = os.path.relpath(file_path, root_directory)
                html_content += f'<li><a href="{rel_path}">{rel_path}</a></li>'

    html_content += """
        </ul>
    </body>
    </html>
    """

    # Write the content to the index.html file
    with open(
        os.path.join(root_directory, "index.html"), "w", encoding="utf-8"
    ) as file:
        file.write(html_content)
    print(f"index.html generated in {root_directory}")


# Run the function to generate the index.html in the current directory
generate_index_html(".")
