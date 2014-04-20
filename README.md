# markdown-view

Renders markdown files as html on the fly.


## Setup
1. Edit `.htaccess' and add the following lines:
```
# Markdown view
Action md-action /markdown/view_md.php
# Filetypes to redirect
AddHandler md-action md
AddHandler md-action mdown
AddHandler md-action markdown
```