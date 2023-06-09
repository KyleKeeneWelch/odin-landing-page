# odin-landing-page

This project is a project undertaken as part of `The Odin Project` learning web course teaching `HTML`, `CSS` and `JavaScript` skills. It involved putting into practice the teachings of `HTML` and `CSS` covered in the previous lessons while also incorporating my own ideas and outside knowledge. **The Business and Products shown are intended for learning and demonstration purposes of web skills and do not provide marketing or rights of the content shown**.

This project enabled me to create a landing (`product`) page of a new product for a business. Other pages included the `sign up` and `contact` pages which allowed users to sign up to the newsletter and contact the team. Each page provided a consistent navigation bar and footer. The navigation bar was responsive and switched to provide a burger menu on mobile and small screens.

The product page provided a simple flexbox layout and responsive design with product images, blockquote and links to the sign up page. The `sign up` page advertised for upcoming products by the business and placed ideas of mock-up products to entice the user to sign up. To sign up, a form is provided with fields including the user's name, email, contact number and checkboxes for preferred contact methods. Much like the `sign up` page, the `contact` page provides a contact form to get in touch with the business and image links allow users to redirect to the business's social media profiles. 

In the backend, `PHP` is used with `XAMPP` to provide a local server to be used to process the form values. The sign up script will validate and clean sign up form values and if valid, will write these to a text file named newsletter.text. The contact script will validate and clean contact form values and will send an automatic email with the mail function to a set address.

## Features

- **Responsive Design** - Utilizing media queries, flexbox and relative values, the project is able to control the display of included content to fit all viewport sizes and devices. The site has a desktop design which will express containers, images and text in a manner that makes use of space appropriately and draws in users. It also has intermediate and mobile designs which will display content to keep it within boundaries and allowing it to be consumed in its new dimensions.

- **Consistent use of Colour, Font and Styles** - Each page within the project contains the same theme and styles that carry over from the last page. The user is easily able to tell which containers provide content, which include form fields, which elements were links, buttons and more. The font is displayed big and bold for headings and important information and the colour scheme provides an attractive look for the site and encourages reading of the business's product. 

- **Newsletter** - An additional feature not part of The Odin Project was the inclusion of a basic newsletter. The newsletter will be in the form of a text file which contains user's who have signed up, their contact information and their preferred contact method(s). These could be used by the business to alert signed up users to new products and services. The newsletter text file is appended to through the backend processing of the sign up form through PHP.

- **Automatic Email** - Another great feature is the use of the mail function to automatically email a correspondant at the business. This provides back-end processing to the contact form which will clean and validate the input and automatically fill in the email components. Once the message has been constructed dynamically from the fields, this is placed and sent to the correct address. 
