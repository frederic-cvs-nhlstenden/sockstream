# Git Workflow 

- No one works directly on the main branch
- For every new feature and/or bug fix, create a branch named after the task e.g.:
- feature/navbar
- fix/button-styling
- Ensure you are pulling regularly!
- Only AFTER completing the task, commit changes with a clear message and request a code review by Frederic or Edoardo before merging into the main branch
- Do not commit every small change separately!!!!!!
- Commit after meaningful progress, like specific feature completion, or bug fix

# File Structure

- Everyone must follow the defined file structure to avoid disorganization (refer to the proposed file structure below)
- Each person is responsible for updating only their designated files and ensuring they are placed in the correct folder
- Make sure all files and folders are lowercase
- No spaces in filenames. (use snake case: this_is_snake_case)

# General code standards 

- Comment your code. What purpose does this code serve? How does it work (applicable to more complex PHP, etc.)
- Use proper nesting to avoid broken elements and poor overview. (Use the “prettier” code formatter on VSC)
- Don’t Repeat Yourself! Avoid duplicating code unnecessarily. Make use of reusable functions, components, and classes/ID’s to keep things clean and maintainable.
- Where applicable, use camelcase for variables. (thisIsCamelCase)

# HTML 

- Make sure all HTML tags are lowercase, correctly indented, and closed.
- Use proper semantic HTML where applicable.

# CSS 

- All elements should have either an ID or a class
- No generalized classes
- Use the same grid for the main elements across all pages (containers etc. can have flex)
- No inline styles
- Use CSS variables for repeated colors (e.g. --blue-100)
- Centralize styles using main.css (always check what is set in main.css to avoid duplicate or clashing rules!!!)

# FILE STRUCTURE 

``` 
SunnySocks/ 
├── assets/ 
│   ├── images/          # All images 
│   ├── icons/           # Icon files 
│   ├── fonts/           # Font files 
│   └── css/
│       └── normalize.css # Normalize css 
├── pages/ 
│   ├── page1.php 
│   └── page2.php 
├── components/ 
│   ├── header.php       # Header file (navigation, logo, etc.) 
│   ├── footer.php       # Footer file (contact info, etc.) 
│   ├── chatbot.php      # Chatbot 
│   └── navbar.php       # Navigation bar 
├── js/ 
│   └── script.js        # JavaScript file (if needed) 
├── includes/ 
│   └── functions.php    # PHP functions used across the site 
└── styles/ 
    ├── layout.css       # Layout styles (grid/flexbox) 
    └── components.css   # Styles for specific components
```
