<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DaisyUI Components - PostrMagic V2</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="container mx-auto p-8">
        <h1 class="text-4xl font-bold mb-4">DaisyUI Component Library</h1>
        <p class="mb-8">A demonstration of all available DaisyUI components styled with the PostrMagic V2 theme.</p>

        <!-- THEME CONTROLLER -->
        <div class="mb-12 p-4 rounded-lg bg-base-200">
            <h2 class="text-2xl font-bold mb-4">Theme Controller</h2>
            <p>Switch between different themes.</p>
            <div class="mt-4">
                <select class="select select-bordered w-full max-w-xs" data-choose-theme>
                    <option disabled>Pick a theme</option>
                    <option value="light">Light</option>
                    <option value="dark">Dark</option>
                    <option value="cupcake">Cupcake</option>
                    <option value="bumblebee">Bumblebee</option>
                    <option value="emerald">Emerald</option>
                    <option value="corporate">Corporate</option>
                    <option value="synthwave">Synthwave</option>
                    <option value="retro">Retro</option>
                    <option value="cyberpunk">Cyberpunk</option>
                    <option value="valentine">Valentine</option>
                    <option value="halloween">Halloween</option>
                    <option value="garden">Garden</option>
                    <option value="forest">Forest</option>
                    <option value="aqua">Aqua</option>
                    <option value="lofi">Lofi</option>
                    <option value="pastel">Pastel</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="wireframe">Wireframe</option>
                    <option value="black">Black</option>
                    <option value="luxury">Luxury</option>
                    <option value="dracula">Dracula</option>
                    <option value="cmyk">CMYK</option>
                    <option value="autumn">Autumn</option>
                    <option value="business">Business</option>
                    <option value="acid">Acid</option>
                    <option value="lemonade">Lemonade</option>
                    <option value="night">Night</option>
                    <option value="coffee">Coffee</option>
                    <option value="winter">Winter</option>
                    <option value="dim">Dim</option>
                    <option value="nord">Nord</option>
                    <option value="sunset">Sunset</option>
                    <option value="postrmagicLight">PostrMagic Light</option>
                    <option value="postrmagicDark">PostrMagic Dark</option>
                </select>
            </div>
        </div>

        <!-- Component Section: Actions -->
        <div id="actions" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Actions</h2>

            <!-- Button -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Button</h3>
                <div class="flex flex-wrap gap-4 items-center bg-base-200 p-4 rounded-lg">
                    <button class="btn">Button</button>
                    <button class="btn btn-primary">Primary</button>
                    <button class="btn btn-secondary">Secondary</button>
                    <button class="btn btn-accent">Accent</button>
                    <button class="btn btn-ghost">Ghost</button>
                    <button class="btn btn-link">Link</button>
                    <button class="btn btn-info">Info</button>
                    <button class="btn btn-success">Success</button>
                    <button class="btn btn-warning">Warning</button>
                    <button class="btn btn-error">Error</button>
                    <button class="btn btn-outline">Outline</button>
                    <button class="btn btn-outline btn-primary">Outline Primary</button>
                </div>
            </div>

            <!-- Dropdown -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Dropdown</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn m-1">Click</div>
                        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li><a>Item 1</a></li>
                            <li><a>Item 2</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Modal</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <button class="btn" onclick="my_modal_1.showModal()">open modal</button>
                    <dialog id="my_modal_1" class="modal">
                        <div class="modal-box">
                            <h3 class="font-bold text-lg">Hello!</h3>
                            <p class="py-4">Press ESC key or click the button below to close</p>
                            <div class="modal-action">
                                <form method="dialog">
                                    <button class="btn">Close</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                </div>
            </div>

            <!-- Swap -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Swap</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <label class="swap text-2xl cursor-pointer">
                        <input type="checkbox" class="hidden" />
                        <div class="swap-on">ON</div>
                        <div class="swap-off">OFF</div>
                    </label>
                </div>
            </div>
        </div>        
        
        <!-- Component Section: Data Display -->
        <div id="data-display" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Data Display</h2>

            <!-- Accordion -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Accordion</h3>
                <div class="bg-base-200 p-4 rounded-lg space-y-2">
                    <div class="collapse collapse-arrow bg-base-100">
                        <input type="radio" name="my-accordion-2" checked="checked" />
                        <div class="collapse-title text-xl font-medium">
                            Accordion Item #1
                        </div>
                        <div class="collapse-content">
                            <p>Content for the first accordion item.</p>
                        </div>
                    </div>
                    <div class="collapse collapse-arrow bg-base-100">
                        <input type="radio" name="my-accordion-2" />
                        <div class="collapse-title text-xl font-medium">
                            Accordion Item #2
                        </div>
                        <div class="collapse-content">
                            <p>Content for the second accordion item.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Alert</h3>
                <div class="bg-base-200 p-4 rounded-lg space-y-4">
                    <div role="alert" class="alert alert-info">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Info alert</span>
                    </div>
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Success alert</span>
                    </div>
                    <div role="alert" class="alert alert-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <span>Warning alert</span>
                    </div>
                    <div role="alert" class="alert alert-error">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <span>Error alert</span>
                    </div>
                </div>
            </div>

            <!-- Avatar -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Avatar</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <div class="avatar">
                        <div class="w-24 rounded">
                            <img src="{{ asset('images/dummy_avatar.png') }}" />
                        </div>
                    </div>
                    <div class="avatar">
                        <div class="w-20 rounded-full">
                            <img src="{{ asset('images/dummy_avatar.png') }}" />
                        </div>
                    </div>
                    <div class="avatar online">
                        <div class="w-16 rounded-full">
                            <img src="{{ asset('images/dummy_avatar.png') }}" />
                        </div>
                    </div>
                    <div class="avatar offline">
                        <div class="w-12 rounded-full">
                            <img src="{{ asset('images/dummy_avatar.png') }}" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Badge -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Badge</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <div class="badge">default</div>
                    <div class="badge badge-primary">primary</div>
                    <div class="badge badge-secondary">secondary</div>
                    <div class="badge badge-accent">accent</div>
                    <div class="badge badge-ghost">ghost</div>
                    <div class="badge badge-outline">outline</div>
                </div>
            </div>

                  <!-- Card -->
                  <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Card</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="card w-96 bg-base-100 shadow-xl">
                        <figure><img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /></figure>
                        <div class="card-body">
                            <h2 class="card-title">Shoes!</h2>
                            <p>If a dog chews shoes whose shoes does he choose?</p>
                            <div class="card-actions justify-end">
                                <button class="btn btn-primary">Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Carousel</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="carousel w-full max-w-lg mx-auto rounded-box">
                        <div id="slide1" class="carousel-item relative w-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg" class="w-full" />
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#slide4" class="btn btn-circle">❮</a>
                                <a href="#slide2" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        <div id="slide2" class="carousel-item relative w-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#slide1" class="btn btn-circle">❮</a>
                                <a href="#slide3" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        <div id="slide3" class="carousel-item relative w-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#slide2" class="btn btn-circle">❮</a>
                                <a href="#slide4" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                        <div id="slide4" class="carousel-item relative w-full">
                            <img src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
                            <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
                                <a href="#slide3" class="btn btn-circle">❮</a>
                                <a href="#slide1" class="btn btn-circle">❯</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chat Bubble -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Chat Bubble</h3>
                <div class="bg-base-200 p-4 rounded-lg space-y-4">
                    <div class="chat chat-start">
                        <div class="chat-bubble">It was said that you would, destroy the Sith, not join them.</div>
                    </div>
                    <div class="chat chat-end">
                        <div class="chat-bubble chat-bubble-primary">I hate you!</div>
                    </div>
                </div>
            </div>

            <!-- Countdown -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Countdown</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <span class="countdown font-mono text-6xl">
                      <span style="--value:15;"></span>h
                      <span style="--value:10;"></span>m
                      <span style="--value:24;"></span>s
                    </span>
                </div>
            </div>

            <!-- Kbd -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Kbd (Keyboard)</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <kbd class="kbd">ctrl</kbd>
                    <kbd class="kbd">alt</kbd>
                    <kbd class="kbd">del</kbd>
                </div>
            </div>

            <!-- Progress -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Progress</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-col space-y-4">
                    <progress class="progress w-56"></progress>
                    <progress class="progress progress-primary w-56" value="10" max="100"></progress>
                    <progress class="progress progress-secondary w-56" value="40" max="100"></progress>
                    <progress class="progress progress-accent w-56" value="70" max="100"></progress>
                    <progress class="progress progress-success w-56" value="100" max="100"></progress>
                </div>
            </div>
        </div>
        
                <!-- Component Section: Data Input -->
                <div id="data-input" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Data Input</h2>

            <!-- Checkbox -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Checkbox</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <input type="checkbox" checked="checked" class="checkbox" />
                    <input type="checkbox" checked="checked" class="checkbox checkbox-primary" />
                    <input type="checkbox" checked="checked" class="checkbox checkbox-secondary" />
                    <input type="checkbox" checked="checked" class="checkbox checkbox-accent" />
                </div>
            </div>

            <!-- File Input -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">File Input</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <input type="file" class="file-input w-full max-w-xs" />
                    <input type="file" class="file-input file-input-bordered file-input-primary w-full max-w-xs mt-4" />
                </div>
            </div>

            <!-- Radio -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Radio</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <input type="radio" name="radio-1" class="radio" checked />
                    <input type="radio" name="radio-1" class="radio" />
                    <input type="radio" name="radio-2" class="radio radio-primary" checked />
                    <input type="radio" name="radio-2" class="radio radio-primary" />
                </div>
            </div>

            <!-- Range -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Range</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <input type="range" min="0" max="100" value="40" class="range" />
                    <input type="range" min="0" max="100" value="60" class="range range-primary mt-4" />
                </div>
            </div>

            <!-- Rating -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Rating</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="rating">
                      <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                      <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                      <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                      <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                      <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                    </div>
                </div>
            </div>

            <!-- Select -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Select</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <select class="select select-bordered w-full max-w-xs">
                      <option disabled selected>Who shot first?</option>
                      <option>Han Solo</option>
                      <option>Greedo</option>
                    </select>
                </div>
            </div>

            <!-- Text Input -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Text Input</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <input type="text" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                    <input type="text" placeholder="Primary" class="input input-bordered input-primary w-full max-w-xs mt-4" />
                </div>
            </div>

            <!-- Textarea -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Textarea</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <textarea class="textarea textarea-bordered" placeholder="Bio"></textarea>
                </div>
            </div>

            <!-- Toggle -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Toggle</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4 items-center">
                    <input type="checkbox" class="toggle" checked />
                    <input type="checkbox" class="toggle toggle-primary" checked />
                    <input type="checkbox" class="toggle toggle-secondary" checked />
                    <input type="checkbox" class="toggle toggle-accent" checked />
                </div>
            </div>
        </div>

                <!-- Component Section: Layout -->
                <div id="layout" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Layout</h2>

            <!-- Artboard -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Artboard</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="artboard artboard-horizontal phone-1">Hi.</div>
                </div>
            </div>

            <!-- Divider -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Divider</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-col w-full">
                    <div>Top content</div>
                    <div class="divider">OR</div>
                    <div>Bottom content</div>
                </div>
            </div>

            <!-- Drawer -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Drawer</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="drawer h-56">
                      <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                      <div class="drawer-content">
                        <label for="my-drawer" class="btn btn-primary drawer-button">Open drawer</label>
                      </div>
                      <div class="drawer-side">
                        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                        <ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content">
                          <li><a>Sidebar Item 1</a></li>
                          <li><a>Sidebar Item 2</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Footer</h3>
                <footer class="footer p-10 bg-neutral text-neutral-content rounded-lg">
                  <nav>
                    <h6 class="footer-title">Services</h6>
                    <a class="link link-hover">Branding</a>
                    <a class="link link-hover">Design</a>
                  </nav>
                  <nav>
                    <h6 class="footer-title">Company</h6>
                    <a class="link link-hover">About us</a>
                    <a class="link link-hover">Contact</a>
                  </nav>
                  <nav>
                    <h6 class="footer-title">Legal</h6>
                    <a class="link link-hover">Terms of use</a>
                    <a class="link link-hover">Privacy policy</a>
                  </nav>
                </footer>
            </div>

            <!-- Hero -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Hero</h3>
                <div class="hero bg-base-200 rounded-lg">
                  <div class="hero-content text-center">
                    <div class="max-w-md">
                      <h1 class="text-5xl font-bold">Hello there</h1>
                      <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi.</p>
                      <button class="btn btn-primary">Get Started</button>
                    </div>
                  </div>
                </div>
            </div>

            <!-- Indicator -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Indicator</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="indicator">
                      <span class="indicator-item badge badge-secondary">new</span>
                      <div class="grid w-32 h-32 bg-base-300 place-items-center">content</div>
                    </div>
                </div>
            </div>

            <!-- Join -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Join</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="join">
                      <button class="btn join-item">Button 1</button>
                      <button class="btn join-item">Button 2</button>
                      <button class="btn join-item">Button 3</button>
                    </div>
                </div>
            </div>

            <!-- Mask -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Mask</h3>
                <div class="bg-base-200 p-4 rounded-lg flex flex-wrap gap-4">
                    <img class="mask mask-squircle" src="https://img.daisyui.com/images/stock/photo-1567653418876-0e29a4b5b4aa.jpg" />
                    <img class="mask mask-heart" src="https://img.daisyui.com/images/stock/photo-1567653418876-0e29a4b5b4aa.jpg" />
                </div>
            </div>

            <!-- Stack -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Stack</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="stack">
                      <div class="grid w-36 h-24 rounded bg-primary text-primary-content place-content-center shadow-md">1</div>
                      <div class="grid w-36 h-24 rounded bg-accent text-accent-content place-content-center rotate-6 shadow-md">2</div>
                      <div class="grid w-36 h-24 rounded bg-secondary text-secondary-content place-content-center -rotate-6 shadow-md">3</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Component Section: Navigation -->
        <div id="navigation" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Navigation</h2>

            <!-- Breadcrumbs -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Breadcrumbs</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="text-sm breadcrumbs">
                      <ul>
                        <li><a>Home</a></li>
                        <li><a>Documents</a></li>
                        <li>Add Document</li>
                      </ul>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Menu</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <ul class="menu bg-base-100 w-56 rounded-box">
                      <li><a>Item 1</a></li>
                      <li>
                        <a>Parent</a>
                        <ul>
                          <li><a>Submenu 1</a></li>
                          <li><a>Submenu 2</a></li>
                        </ul>
                      </li>
                      <li><a>Item 3</a></li>
                    </ul>
                </div>
            </div>

            <!-- Navbar -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Navbar</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="navbar bg-base-100 rounded-box">
                      <div class="flex-1">
                        <a class="btn btn-ghost text-xl">daisyUI</a>
                      </div>
                      <div class="flex-none">
                        <button class="btn btn-square btn-ghost">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                        </button>
                      </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Pagination</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="join">
                      <button class="join-item btn">1</button>
                      <button class="join-item btn btn-active">2</button>
                      <button class="join-item btn">3</button>
                      <button class="join-item btn">4</button>
                    </div>
                </div>
            </div>

            <!-- Steps -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Steps</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <ul class="steps">
                      <li class="step step-primary">Register</li>
                      <li class="step step-primary">Choose plan</li>
                      <li class="step">Purchase</li>
                      <li class="step">Receive Product</li>
                    </ul>
                </div>
            </div>

            <!-- Tabs -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Tabs</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <!-- Tab navigation -->
                    <div class="tabs tabs-lifted" role="tablist">
                        <a class="tab tab-active" onclick="showTab(event, 'tab1')">Tab 1</a>
                        <a class="tab" onclick="showTab(event, 'tab2')">Tab 2</a>
                        <a class="tab" onclick="showTab(event, 'tab3')">Tab 3</a>
                    </div>
                    <!-- Tab content -->
                    <div id="tab1" class="tab-content-panel bg-base-100 border-base-300 rounded-box p-6">
                        Tab 1 content
                    </div>
                    <div id="tab2" class="tab-content-panel bg-base-100 border-base-300 rounded-box p-6" style="display: none;">
                        Tab 2 content
                    </div>
                    <div id="tab3" class="tab-content-panel bg-base-100 border-base-300 rounded-box p-6" style="display: none;">
                        Tab 3 content
                    </div>
                </div>
            </div>
        </div>

        <!-- Component Section: Mockup -->
        <div id="mockup" class="mb-12">
            <h2 class="text-3xl font-bold mb-6 border-b-2 border-primary pb-2">Mockup</h2>

            <!-- Code -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Code</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="mockup-code">
                      <pre data-prefix="$"><code>npm i daisyui</code></pre>
                      <pre data-prefix=">" class="text-warning"><code>installing...</code></pre>
                      <pre data-prefix=">" class="text-success"><code>Done!</code></pre>
                    </div>
                </div>
            </div>

            <!-- Phone -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Phone</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                <div class="mockup-phone border-primary">
                      <div class="mockup-phone-camera"></div>
                      <div class="mockup-phone-display text-white grid place-content-center">Hi.</div> 
                    </div>
                </div>
            </div>

            <!-- Window -->
            <div class="mb-8">
                <h3 class="text-2xl font-semibold mb-4">Window</h3>
                <div class="bg-base-200 p-4 rounded-lg">
                    <div class="mockup-window border bg-base-300">
                      <div class="flex justify-center px-4 py-16 bg-base-200">Hello!</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        // Theme toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.querySelector('[data-choose-theme]');
            
            // Set initial state based on current theme
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const themeOptions = Array.from(themeToggle.options);
            const currentThemeOption = themeOptions.find(option => option.value === currentTheme);
            if (currentThemeOption) {
                currentThemeOption.selected = true;
            }
            
            themeToggle.addEventListener('change', function() {
                document.documentElement.setAttribute('data-theme', this.value);
            });
        });

        // Tab functionality
        function showTab(event, tabId) {
            const tabContentPanels = document.querySelectorAll('.tab-content-panel');
            tabContentPanels.forEach(panel => {
                panel.style.display = 'none';
            });
            const tabButtons = document.querySelectorAll('.tab');
            tabButtons.forEach(button => {
                button.classList.remove('tab-active');
            });
            event.currentTarget.classList.add('tab-active');
            document.getElementById(tabId).style.display = 'block';
        }
    </script>
</body>
</html>
