<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>FoodBook - The Social Network for Foodies</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>FoodBook - The Social Network for Foodies</title>
   <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
   <div id="app">
      <div class="site-content bg-white overflow-hidden" data-testid="site-content">

         <header>
            <!-- logo -->
            <div class="space-x-2 flex items-center">
               <img class="h-8 w-auto" src="asset/images/logo.svg" alt="logo">
               <p class="text-2xl font-sans font-bold text-gray-900">FoodBook</p>
            </div>

            <!-- login popup btn -->
            <nav class="navigation">
               <a href="#second">About</a>
               <a href="#fifth">Team</a>
               <a href="#fourth">Join us</a>
               <button class="btnLogin-popup">Login</button>
            </nav>
         </header>

         <section id="one" class="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-48 h-small" sectionname="hero" imagestretch="true" sectioncomponent="Hero" sortorder="0">

            <!-- header -->



            <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
               <div class="relative z-[1]">

                  <div class="mt-14">
                     <div class="mt-6 sm:max-w-xl">
                        <h1 class="text-4xl font-black tracking-tight text-gray-900 sm:text-6xl md:text-7xl">Connect
                           Over Cooking: Join the FoodBook Community Today<span class="text-primary"></span></h1>


                        <h2 class="mt-6 text-lg text-gray-500 sm:text-xl">Share your recipes, connect with other food
                           lovers, and discover new flavors with FoodBook.</h2>

                     </div>
                     <div class="mt-10 space-y-4">
                        <ile-root id="ile-1" class="mt-4 sm:max-w-lg">
                           <form class="grid gap-2 grid-cols-1 sm:w-full sm:flex sm:items-center sm:flex-wrap mt-4 sm:max-w-lg">
                              <label for="hero-email" class="sr-only">Email address</label><input id="hero-email" value="" type="email" class="block w-full px-5 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary focus-visible:ring-primary flex-1" required placeholder="Enter your email...">
                              <div><button to class="ui-button ui-button-base ui-button-primary" type="submit">Submit</button></div>
                           </form>
                        </ile-root>
                        <script></script>
                        <script type="module" async>
                           import {
                              h as e,
                              c as m
                           } from "js/iles.54b00b61.js";
                           import {
                              c as o
                           } from "js/SignupForm.8cfa132a.js";
                           import "js/vendor-vue.398eccbf.js";
                           import "js/UiButton.9479e401.js";
                           import "js/vite.c27b6911.js";
                           e(m, o, "ile-1", {
                              name: "hero",
                              placeholder: "Enter your email...",
                              buttonLabel: "Submit",
                              siteId: "ZUr66n2ziyujfiNTQpyW",
                              class: "mt-4 sm:max-w-lg"
                           }, {});
                        </script>
                     </div>
                     <!-- Social Proofing --><!-- User Review -->
                     <div class="mt-6">
                        <div class="inline-flex items-center">
                           <img src="asset/images/user14.png" alt="Michael Greene" class="object-cover inline-block mr-3 border-2 border-primary rounded-full sm:mr-2 h-14 w-14">
                           <div>
                              <p class="sm:pl-2.5 text-base font-black tracking-tight text-gray-800 sm:text-lg">
                                 "FoodBook has revolutionized the way I cook and connect with people. I&#39;ve
                                 learned new techniques, discovered amazing flavors, and made friends for life!"</p>
                              <p class="sm:pl-2.5 text-sm sm:text-base font-bold text-gray-500">Michael Greene </p>
                           </div>
                        </div>
                     </div>
                  </div>


               </div>

               <!-- --------------------------------------------->



               <div class="relative z-[1]">

                  <!-- Image -->
                  <!-- <div class="mt-12 sm:mt-16 lg:mt-0">
                  <div class="pl-4 sm:-mr-48 sm:-mr-6 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center">
                     <img src="images/image1.jpeg" class="rounded-l-2xl lg:left-0 w-full 2xl:max-h-[44rem]"
                        alt="Connect with other foodies">
                  </div>
               </div> -->

                  <div class="wrapper active-popup active1">

                     <span class="icon-close"><ion-icon name="close"></ion-icon></span>


                     <div class="form-box login">
                        <h2>Login</h2>
                        
                        <p class="error" id="loginError"></p>

                        <p class="registered" id="registerSuccess"></p>

                        <form id="login-form">
                           <div class="input-box">
                              <span class="icon"><ion-icon name="person"></ion-icon></span>
                              <input class="login-data" style="font-size:18px;" type="text" placeholder="Username" name="username" pattern="^[A-Za-z0-9._]+$" required>
                              <label>Username</label>
                           </div>

                           <div class="input-box">
                              <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                              <input class="login-data" style="font-size:18px;" type="password" placeholder="Password" name="password" required>
                              <label>Password</label>
                           </div>

                           <div class="remember-forgot">
                              <label><input type="checkbox"> Remember me</label>
                              <a href="#">Forgot Password?</a>
                           </div>

                           <button type="submit" class="btn" id="loginform">Login</button>

                           <div class="login-register">
                              <p>Don't have an account? <a href="#" class="register-link"> Register</a></p>
                           </div>

                        </form>
                     </div>



                     <div class="form-box register">
                        <h2>Register</h2>

                        <p class="error" id="registerError"></p>

                        <form id="sample-form">

                           <div class="input-box">
                              <span class="icon"><ion-icon name="person"></ion-icon></span>
                              <input style="font-size:18px;" type="text" placeholder="Username" name="username" class="register-data" pattern="^[A-Za-z0-9._]+$" required>
                              <label>Username</label>
                           </div>

                           <div class="input-box">
                              <span class="icon"><ion-icon name="mail"></ion-icon></span>
                              <input style="font-size:18px;" type="email" placeholder="Email" name="email" class="register-data" required>
                              <label>Email</label>
                           </div>

                           <div class="input-box">
                              <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                              <input style="font-size:18px;" type="password" placeholder="Password" name="password" class="register-data" required>
                              <label>Password</label>
                           </div>

                           <div class="remember-forgot">
                              <label><input type="checkbox" id="checkbox" required> I agree to the terms & conditions</label>
                           </div>

                           <button type="submit" class="btn getotp" id="submitform">Register</button>

                           <div class="login-register">
                              <p>Already have an account? <a href="#" class="login-link"> Login</a></p>
                           </div>

                        </form>
                     </div>

                     <!-- ------------ OTP ---------- -->

                     <div class="form-box otp">
                        <h2>Enter OTP</h2>
                        <h1 class="enterotp">Check your email for the OTP</h1>
                        
                        <?php if (isset($_GET['error'])) { ?>
                           <p class="error"> <?php echo $_GET['error']; ?></p>
                        <?php unset($_GET['error']); } ?>

                        <?php if (isset($_GET['registered'])) { ?>
                           <p class="registered"> <?php echo $_GET['registered']; ?></p>
                        <?php unset($_GET['registered']); } ?>

                        <form action="#" method="post">
                           <div class="input-box">
                              <input class="otpbox" style="font-size:24px; text-align: center;" type="text" placeholder="OTP" name="email" maxlength="6" required>
                              <!-- <label>One Time Password</label> -->
                           </div>

                           <button type="submit" class="btn">Submit</button>

                           <!-- <div class="resend">
                              <p>Don't have an account? <a href="#" class="register-link"> Register</a></p>
                           </div> -->

                        </form>
                     </div>

                     <!-- --------------------------- -->

                  </div>

               </div>

               <!-- --------------------------------------------->

            </div>

         </section>



         <section id="second" class="relative pt-16 pb-32 overflow-hidden bg-white space-y-24" sectionname="features" id="6wkewrbdjj" sectioncomponent="Features" sortorder="1" site-name="FoodBook" site-id="ZUr66n2ziyujfiNTQpyW" site-logo-url="asset/images/logo.svg" site-logo-size="md">
            <div>
               <div class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24">
                  <div class="lg:col-start-2 lg:mx-0 lg:px-0 lg:pr-8 max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-32 2xl:mx-0">
                     <!-- Feature -->
                     <div>
                        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Share your favorite
                           recipes<span class="text-primary">.</span></h2>
                        <p class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl">FoodBook makes it easy to
                           showcase your culinary creations with engaging images and videos. Share your favorite
                           family recipes or experiment with new ones in a supportive community.</p>
                     </div>
                     <!-- CTA -->
                     <div></div>
                     <!-- Review -->
                  </div>
                  <!-- Image -->
                  <div class="lg:col-start-1 mt-12 sm:mt-16 lg:mt-0">
                     <div class="pr-4 -sm:ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center">
                        <img src="asset/images/food4.jpeg" alt="Share your favorite recipes">
                     </div>
                  </div>
               </div>
            </div>
            <div>
               <div class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24">
                  <div class="lg:mx-auto lg:max-w-3xl xl:pl-12 2xl:pl-20 2xl:justify-self-end max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-32 2xl:mx-0">
                     <!-- Feature -->
                     <div>
                        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Connect with other
                           foodies<span class="text-primary">.</span></h2>
                        <p class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl">Meet other passionate home
                           cooks and food enthusiasts who share your love for all things culinary. Join groups, start
                           discussions, and make new food friends from around the world.</p>
                     </div>
                     <!-- CTA -->
                     <div></div>
                     <!-- Review -->
                  </div>
                  <!-- Image -->
                  <div class="mt-12 sm:mt-16 lg:mt-0">
                     <div class="pl-4 sm:-mr-48 sm:-mr-6 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center">
                        <img src="asset/images/food3.jpeg" class="rounded-l-2xl lg:left-0 w-full 2xl:max-h-[44rem]" alt="Connect with other foodies">
                     </div>
                  </div>
               </div>
            </div>
            <div>
               <div class="lg:mx-auto lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-6 xl:gap-12 2xl:gap-24">
                  <div class="lg:col-start-2 lg:mx-0 lg:px-0 lg:pr-8 max-w-xl px-4 mx-auto space-y-6 sm:px-6 lg:py-32 2xl:mx-0">
                     <!-- Feature -->
                     <div>
                        <h2 class="text-4xl font-extrabold tracking-tight text-gray-900">Discover new flavors and
                           techniques<span class="text-primary">.</span></h2>
                        <p class="mt-4 text-lg leading-relaxed text-gray-500 sm:text-xl">Find inspiration for your
                           next meal with thousands of recipes and cooking tips available on FoodBook. Explore new
                           cuisines, cooking styles, and ingredients in a vibrant community of food lovers.</p>
                     </div>
                     <!-- CTA -->
                     <div></div>
                     <!-- Review -->
                  </div>
                  <!-- Image -->
                  <div class="lg:col-start-1 mt-12 sm:mt-16 lg:mt-0">
                     <div class="pr-4 -sm:ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full lg:flex lg:items-center">
                        <img src="asset/images/food1.jpeg" class="lg:right-0 rounded-r-2xl w-full 2xl:max-h-[44rem]" alt="Discover new flavors and techniques">
                     </div>
                  </div>
               </div>
            </div>
         </section>


         <section id="third" class="py-12 overflow-hidden bg-primary bg-opacity-80 md:py-20" sectionname="testimonials" id="pjh8e2ozkp" sectioncomponent="Testimonials" sortorder="2" site-name="FoodBook" site-id="ZUr66n2ziyujfiNTQpyW" site-logo-url="asset/images/logo.svg" site-url="https://www.mixo.io/site/food-book-wlf67" site-logo-size="md">
            <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
               <svg class="absolute transform top-full right-full translate-x-1/3 -translate-y-1/4 lg:translate-x-1/2 xl:-translate-y-1/2 rotate-3" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-squares">
                  <title id="svg-squares">squares</title>
                  <defs>
                     <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-primary" fill="currentColor"></rect>
                     </pattern>
                  </defs>
                  <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)"></rect>
               </svg>
               <div class="relative">
                  <blockquote>
                     <div class="max-w-3xl mx-auto text-xl font-bold leading-7 text-center text-white md:leading-10 md:text-3xl text-shadow-sm">
                        <p> &quot;This is the Facebook for foodies! I love sharing my recipes and learning from other
                           home cooks. The features are intuitive and easy to use.&quot; </p>
                     </div>
                     <footer class="mt-8">
                        <div class="md:flex md:items-center md:justify-center">
                           <div class="md:flex-shrink-0"><img src="asset/images/user13.png" class="w-10 h-10 mx-auto border-2 border-slate-200 rounded-full shadow-sm object-cover" alt="Testimonial"></div>
                           <div class="mt-3 text-center md:mt-0 md:ml-3 md:flex md:items-center text-shadow-sm">
                              <div class="text-lg font-medium text-white">Dean Lia</div>
                           </div>
                        </div>
                     </footer>
                  </blockquote>
               </div>
            </div>
         </section>



         <section id="fourth" class="relative py-12 sm:py-20 md:py-24 lg:py-32" sectionname="cta" id="jvrloltfkk" sectioncomponent="Cta" sortorder="4" site-name="FoodBook" site-logo-url="asset/images/logo.svg" site-url="https://www.mixo.io/site/food-book-wlf67" site-logo-size="md" data-v-77b1cd82>
            <div aria-hidden="true" class="block" data-v-77b1cd82>
               <div class="absolute inset-y-0 left-0 w-1/2 bg-gray-50 rounded-r-3xl mb-12" data-v-77b1cd82></div>
               <svg class="absolute -ml-3 top-8 left-1/2" width="404" height="392" fill="none" viewBox="0 0 404 392" data-v-77b1cd82>
                  <defs data-v-77b1cd82>
                     <pattern id="8228f071-bcee-4ec8-905a-2a059a2cc4fb" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse" data-v-77b1cd82>
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" data-v-77b1cd82></rect>
                     </pattern>
                  </defs>
                  <rect width="404" height="392" fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)" data-v-77b1cd82>
                  </rect>
               </svg>
            </div>
            <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8" data-v-77b1cd82>
               <div class="relative px-6 py-10 overflow-hidden bg-white border-primary border-2 shadow-xl rounded-2xl sm:px-12 sm:py-20" data-v-77b1cd82>
                  <div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0" data-v-77b1cd82>
                     <svg class="absolute inset-0 w-full h-full" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1463 360" data-v-77b1cd82>
                        <path class="text-primary/5" fill="currentColor" d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z" data-v-77b1cd82></path>
                        <path class="text-primary/10" fill="currentColor" d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z" data-v-77b1cd82>
                        </path>
                     </svg>
                  </div>
                  <div class="relative" data-v-77b1cd82>
                     <div class="flex flex-wrap justify-center w-full mx-auto sm:max-w-3xl" data-v-77b1cd82>
                        <img src="asset/images/user3.jpeg" alt="User ben" class="user-avatar" data-v-77b1cd82>
                        <img src="asset/images/user2.jpeg" alt="User beth" class="user-avatar" data-v-77b1cd82><img src="asset/images/user4.jpeg" alt="User claire" class="user-avatar" data-v-77b1cd82><img src="asset/images/user5.jpeg" alt="User iwan" class="user-avatar" data-v-77b1cd82><img src="asset/images/user15.jpeg" alt="User lori" class="user-avatar" data-v-77b1cd82><img src="asset/images/user1.webp" alt="User mali" class="user-avatar" data-v-77b1cd82><img src="asset/images/user12.jpeg" alt="User mi" class="user-avatar" data-v-77b1cd82><img src="asset/images/user11.jpeg" alt="User nim" class="user-avatar" data-v-77b1cd82><img src="asset/images/user10.jpeg" alt="User san" class="user-avatar" data-v-77b1cd82><img src="asset/images/user9.jpeg" alt="User sanjid" class="user-avatar" data-v-77b1cd82><img src="asset/images/user8.jpeg" alt="User steph" class="user-avatar" data-v-77b1cd82><img src="asset/images/user7.jpeg" alt="User zak" class="user-avatar" data-v-77b1cd82><img src="asset/images/user6.jpeg" alt="User judith" class="user-avatar" data-v-77b1cd82>
                     </div>
                     <div class="mt-6 sm:mt-12 sm:text-center" data-v-77b1cd82>
                        <h2 class="text-3xl font-black tracking-tight text-gray-900 sm:text-4xl md:text-5xl md:leading-tight md:max-w-4xl md:mx-auto" data-v-77b1cd82>Join FoodBook Today and Start Sharing Your Love for Food<span class="text-primary" data-v-77b1cd82>.</span></h2>
                     </div>
                     <div class="mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg flex flex-col items-center" data-v-77b1cd82>
                     </div>
                     <ile-root id="ile-3" class="mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg">
                        <form class="grid gap-2 grid-cols-1 sm:w-full sm:flex sm:items-center sm:flex-wrap mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg">
                           <label for="cta-email" class="sr-only">Email address</label><input id="cta-email" value="" type="email" class="block w-full px-5 py-3 text-base text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring-primary focus-visible:ring-primary flex-1" required placeholder="Enter your email...">
                           <div><button to class="ui-button ui-button-base ui-button-primary" type="submit">Submit</button></div>
                        </form>
                     </ile-root>
                     <script></script>
                     <script type="module" async>
                        import {
                           h as m,
                           c as t
                        } from "js/iles.54b00b61.js";
                        import {
                           c as a
                        } from "js/SignupForm.8cfa132a.js";
                        import "js/vendor-vue.398eccbf.js";
                        import "js/UiButton.9479e401.js";
                        import "js/vite.c27b6911.js";
                        m(t, a, "ile-3", {
                           name: "cta",
                           placeholder: "Enter your email...",
                           buttonLabel: "Submit",
                           siteId: "ZUr66n2ziyujfiNTQpyW",
                           class: "mt-6 sm:mt-12 sm:mx-auto sm:max-w-lg"
                        }, {});
                     </script>
                  </div>
               </div>
            </div>
         </section>



         <section id="fifth" class="px-4 py-12 sm:py-16 sm:px-6 lg:px-8 md:py-24 bg-primary/10" sectionname="note" id="uqfp23gka2" sectioncomponent="Note" sortorder="5" site-name="FoodBook" site-id="ZUr66n2ziyujfiNTQpyW" site-logo-url="asset/images/logo.svg" site-url="https://www.mixo.io/site/food-book-wlf67" site-logo-size="md" data-v-1ff96999>
            <h2 class="mb-12 text-4xl font-bold text-center" data-v-1ff96999>Share your recipes, connect with other
               food lovers, and discover new flavors with FoodBook.<span class="text-primary" data-v-1ff96999>.</span>
            </h2>
            <div class="max-w-2xl mx-auto overflow-hidden bg-white rounded-lg shadow" data-v-1ff96999>
               <div class="px-4 py-5 space-y-4 sm:p-6" data-v-1ff96999>
                  <div class="note-text" data-v-1ff96999>FoodBook makes it easy to showcase your culinary creations
                     with engaging images and videos. Share your favorite family recipes or experiment with new ones
                     in a supportive community.</div>
                  <div class="flex items-center mt-6" data-v-1ff96999>
                     <div data-v-1ff96999>
                        <p class="text-xl font-bold" data-v-1ff96999>Rohit</p>
                        <p data-v-1ff96999>Founder</p>
                     </div>
                  </div>
               </div>
            </div>
         </section>


      </div>
   </div>
   <ile-root id="ile-2"></ile-root>
   <script src="asset/js/script.js"></script>
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   </div>
</body>

</html>