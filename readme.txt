=== Zigaform - Price Calculator & Cost Estimation Form Builder Lite ===
Contributors: softdiscover  
Donate link: https://1.envato.market/DdzY2  
License: GPLv3  
License URI: http://www.gnu.org/licenses/gpl.html  
Tags: calculator, form builder, estimation, calculated, form, estimate, estimation, estimator, cost estimation, calculation, price calculator, wizard, bootstrap, AJAX, contact, contact form, email, feedback, multilingual  
Requires at least: 5.0  
Tested up to: 6.6.1  
Stable tag: 7.4.3  

Create estimation forms using this powerful drag-and-drop estimation form builder, enabling you to build forms in just a few minutes.

== Description ==

**Zigaform - Calculator & Cost Estimation Form Builder Lite** is a real-time, drag-and-drop form builder designed to help you create estimation forms in just a few easy steps. It allows you to estimate any service for your clients and proceed to checkout using a payment gateway. The plugin also offers an advanced grid system and skin customizer to build professional forms, along with a comprehensive administration section for managing numerous form options. Best of all, no programming skills are required!

[Watch the Demo Video](https://www.youtube.com/watch?v=6dSZ9aqGrTc&w=532&rel=0)

### Use Cases
- Creating forms with automatically calculated fields
- Finance calculators
- Quote calculators
- Booking cost calculators
- Date calculators
- Health/fitness calculators

[Check out other calculators made with Zigaform](https://wordpress-cost-estimator.zigaform.com/docs-category/examples/)

### Features (Free Lite Version):
- Real-time drag-and-drop form builder
- Cost estimation and calculation feature (supports complex math formulas)
- Offline Payment Gateway included
- 42+ ready-to-use form elements
- Full skin customizer with live preview
- Advanced grid system for building form estimators
- Dynamic validation (email, letters, numbers, etc.)
- Advanced summary estimate box with sticky feature
- Multiple form templates available
- Over 650 custom fonts and 769 icons for form elements
- Create custom form fields with ease
- Multiple forms on a single WordPress page
- Graphic chart entry reports by form
- Advanced entry search functionality
- Import/export custom forms
- Duplicate forms option
- Accept multiple file uploads via forms
- Detailed entries report by form
- Ajax-powered forms
- Bootstrap integration
- Live email notifications on form submissions
- Unlimited forms with retina activation
- Multi-language support (Spanish, Italian, French, Russian, German, Portuguese, Chinese)
- Fully responsive forms with cross-browser support (IE8+, Chrome, Firefox, Safari, Opera)
- No programming skills required
- Easily add/edit/manage forms, fields, entries, and tons of features
- Language Switcher

### Premium Version
If you love the Lite version, consider trying the premium version with additional features:
1. PayPal payment integration
2. Advanced conditional logic
3. Wizard forms with real-time editor and live preview (two themes available)
4. Invoicing feature with detailed listings
5. Export submissions to CSV
6. Extended HTML documentation
7. Priority support and many more features

[Explore Zigaform - Cost Estimation & Payment Form Builder Premium](http://goo.gl/C261zv)

More info: https://wordpress-cost-estimator.zigaform.com/

### Extensions
1. **Animation Effects Add-On (Pro)**: Animate your fields with various effects, including delay and customization options.
2. **WebHooks Add-On (Pro)**: Send data from your forms to any custom page or script via WebHooks. Perfect for applications that need updates with each form submission.
3. **WooCommerce Add-On (Lite)**: Add a custom WooCommerce form to your product pages. Generate product prices directly from form calculations.

### Overall Features
#### Drag-and-Drop Form Builder
Zigaform features an intuitive drag-and-drop builder, allowing you to create forms in minutes. All forms are fully responsive and mobile-friendly, with options for multi-page forms, file uploads, smart conditional logic, and more.

#### Custom Formula and Math Calculation
Zigaform supports custom formulas and complex calculations, enabling you to create anything from basic to highly complex estimation forms.

#### Automated Notification Emails
Create custom email notifications to receive alerts when new entries are submitted. Personalize the subject, message, and include entry details with tons of options.

#### Advanced Grid System
Create unique form layouts with Zigaform’s responsive grid system, supporting unlimited grid nesting.

#### Multi-Page Forms (Wizard Form)
Break up forms into multiple pages with a progress bar, enhancing the user experience.

#### 42+ Advanced Fields
Choose from a wide variety of field types:
- Text Input (Single Line)
- Textarea (Multiple Lines)
- Checkbox
- Radio (Multiple Choice)
- Select Dropdown
- HTML
- File Upload
- Image Upload
- Password
- Slider, Range, Spinner
- Captcha, ReCaptcha
- Hidden Field
- Star Rating
- Color Picker
- Date Picker, Time Picker
- Dynamic Checkboxes, Radiobuttons
- And many more...

#### Captcha Spam Protection
Zigaform integrates Google reCaptcha to prevent spammers and spambots, ensuring your site remains secure.

#### Detailed Submitted Entries
View submitted entries in the WordPress admin area and send data via email. Features include bulk export to CSV, advanced filtering, and search across all entries.

#### Fully Responsive Design
All forms are crafted to fit any device, ensuring a consistent user experience across mobile, tablet, and desktop.

#### Control Every Element
Fine-tune every part of your form, from general settings to individual fields, submit actions, and emails.

#### Effortless WordPress Integration
Easily add a Zigaform to your site with widgets, shortcodes, or automatic content appending.

#### Translation Ready - Multi-Language Support
Zigaform supports multiple languages and is translation-ready for easy localization.

#### Heavy on Security
Built with nonce security, Google reCaptcha, and optional Captcha, Zigaform protects your forms from automated submissions.

#### Fast & Scalable
Optimized for performance, Zigaform loads resources only when needed, keeping your website fast and efficient.

#### Free Support and Upgrades [Pro Version]
Zigaform offers excellent support and regular updates, making it a great choice for WordPress users of all levels.

### What Makes Zigaform Great?
- Unlimited forms, fields, emails, actions, and submissions
- Extensive customization options, including custom CSS and HTML
- Beginner-friendly with a drag-and-drop builder
- Tons of advanced features for creating powerful forms
- Developer-friendly with full documentation available
- 100% responsive and optimized for speed
- Comprehensive security features, including Google reCaptcha
- Conditional logic for creating dynamic forms [Pro Version]
- Continuous updates with enhanced functionalities

[Visit the Documentation](https://wordpress-cost-estimator.zigaform.com/docs-category/documentation/)


= Calculated "hidden" Fields =

The calculated fields can be "hidden" fields. This way the calculated values of those "hidden" fields won't be displayed in the form. This is useful for using intermediate calculated values or for showing the calculated values only into the email.


= Equations / formulas Format =

Here are some sample formulas that can be used in the math formula feature:

* With simple mathematical operations:


    `fieldname1 + fieldname2`

    `fieldname1 * fieldname2`

    `fieldname1 / fieldname2`

    `fieldname1 - fieldname2`



* With multiple fields and fields grouping included:


    `fieldname1 * ( fieldname2 + fieldname3 )`


 


* There is a huge number of equations that can't be recreated with simple mathematical operators, or the operations listed above, requiring "IF" conditions, here is a sample of the formula that can be used in that case:

    ```
            if(fieldname3 > 100) return fieldname1+fieldname2;
            if(fieldname3 <= 100) return fieldname1*fieldname2;
    ```


* For complex equations where is required to define blocks of JavaScript code, you should use the following format:

 
        `    var calculatedValue = 0;`
        `    //Your code here`
        `    return calculatedValue;`
 


.... and note that the **return** value of that function will be the value assigned to the calculated field. More info here: https://wordpress-cost-estimator.zigaform.com/docs/math-calculation/


== Installation ==

There are 2 ways to install. Please follow the steps below: 

= Via FTP =
1. After your download unzip `Zigaform - Calculator & Cost Estimation Form Builder` from your download .zip
2. Open your FTP client
3. Upload the `Zigaform Estimator Lite` folder to /wp-content/plugins/ directory on your hosting server
4. Activate the Zigaform - Calculator & Cost Estimation Form Builder Lite plugin through the 'Plugins' menu in WordPress
5. Configure the plugin by going to the `Zigaform - Calculator & Cost Estimation Form Builder Lite` menu that appears in your admin menu

= Via backend of WordPress =
1. After your download, log into backend of your WordPress 
2. Go to Plugins > Add New
3. Click the Upload link
4. Click Browse and locate the file that you downloaded and click *Install Now*
5. After Wordpress has finished unpacking the file click on *Activate Plugin*
6. After the plugin has been activated you will notice a new menu item on the left hand navigation labelled Zigaform Express

== Frequently Asked Questions ==

= How do I create an estimation form? =

1. Click on the Zigaform Estimator Lite menu > click on add new form button
2. A pop-up will appear, enter the title of your form 
3. Drag and drop or click to add form elements to form
4. Tune your options and click on save form button to save your changes
5. A pop-up with shortcode will appear. just copy the shortcode and paste to your post/page.

https://www.youtube.com/watch?v=XcLBt94ZRZ8&w=532&rel=0

== Screenshots ==

1. Main form editor panel
2. Form detailed entries report
3. Saved forms in list
4. graphic chart entry report by form
5. Export form feature
6. Import form feature
7. Preview form

== Changelog ==

To read the changelog for the latest Gutenberg release, please navigate to the <a href="https://github.com/Softdiscover/Zigaform-WP-Cost-Estimator-Lite/releases/latest">release page</a>.