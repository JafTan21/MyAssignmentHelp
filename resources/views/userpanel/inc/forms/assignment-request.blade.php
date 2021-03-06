<section class="hero-banner bg-light py-5" id="assignmentRequestSection">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <h1 class="mt-3 text-center">
                    Our team is waiting to help you
                </h1>
                <p class="lead text-secondary my-5 text-center">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum natus reprehenderit quam neque
                    culpa mollitia dolor doloremque dolores.
                </p>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">

                        <form action="{{ route('userpanel.assignmentRequest.store') }}" method="POST"
                            class="bg-white p-2" style="color:#373737">
                            @csrf
                            <div class="row text-center">
                                <strong>It’s Time You Sought Help From</strong>
                                <span style="font-size:18px; color: #c46405">educompro.com Experts</span>
                            </div>


                            @include('layouts.errors')

                            <div class="__flex-center flex-wrap">
                                <div class="__flex-center flex-column mt-1 col-md-6 col-12">
                                    <div class="text-left" style="width: 90%;">
                                        <label>Enter your email id</label>
                                        <input name="email" type="email" class="__input" placeholder="Your email">
                                    </div>
                                </div>
                                <div class="__flex-center flex-column mt-1 col-md-6 col-12">
                                    <div class="text-left" style="width: 90%;">
                                        <label>Subject code</label>
                                        <input name="subject_code" type="text" class="__input"
                                            placeholder="Subject code">
                                    </div>
                                </div>

                                <div class="__flex-center flex-column mt-1 col-md-6 col-12">
                                    <div class="text-left" style="width: 90%;">
                                        <label>Choose Assignment Deadline</label>
                                        <input name="deadline" type="datetime-local" class="__input">
                                    </div>

                                    <div class="text-left mt-1" style="width: 90%;">
                                        <label>No. Of Pages/Words </label>
                                        <div class="input-group mt-1">
                                            <button type="button" class="input-group-text " style="cursor: pointer;">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                            <input name="number_of_pages" type="text" class="__input m-0"
                                                style="width: 25%">
                                            <button type="button" class="input-group-text " style="cursor: pointer;">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <span class="text-secondary" style="margin: 6px 0 0 12px">
                                                250 words </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="__flex-center flex-column mt-1 col-md-6 col-12">
                                    <div class="text-left" style="width: 90%;">
                                        <label>Enter Assignment Description</label>
                                        <textarea name="description" class="__input" rows="5"
                                            placeholder="Enter Assignment Description"></textarea>
                                    </div>
                                </div>
                                <div class="__flex-center flex-column mt-2 col-12">
                                    <div class="text-left d-flex align-items-center" style="width: 94%;">
                                        <input type="checkbox" id="checkbox" class="custom-checkbox"
                                            style="background: #c46405">
                                        <label for="checkbox" style="font-size: 14px; margin-left: 8px;">
                                            Yes, alert me for offers and important updates
                                        </label>
                                    </div>
                                </div>
                                <div class="__flex-center flex-column my-4 col-12">
                                    <button class="btn btn-info" type="submit">
                                        Free Assistance
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>