@extends("layouts.users")

@section("info")
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        @if (Auth::id() == $admin->id) 
        
            <div class="container text-center">
                <div class="row row-cols-3 d-flex justify-content-center">
                    @foreach ($users as $el)
                        <div class="col d-flex border border-dark-subtle justify-content-center m-5 bg-secondary-subtle p-0">
                            <div class="position-relative w-100 px-3">
                                <div class="position-absolute top-0 start-50 translate-middle bg-secondary bg-gradient rounded-circle">
                                    <img src="../avatar.png" alt="avatar">
                                </div>
                                <div class="mt-5 grid gap-2 px-3">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div><b>Name:</b></div> 
                                        <div class="name">{{ $el->name }}</div> 
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <div><b>Email:</b></div> 
                                        <div>{{ $el->email }}</div> 
                                    </div>
                                </div>
                                <hr>
                                <div class="grid gap-2 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <span><b>Registered:</b></span>
                                        <span>{{ $el->created_at }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <span><b>Last active:</b></span> 
                                        <span>{{ $el->updated_at }}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>
            </div>

        @else
            <p>К сожалению вы не Админ 😔</p>
        @endif
    </div>
@endsection

<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    setTimeout(
        () => {
            let name = document.querySelectorAll(".edit-name");
            let email = document.querySelectorAll(".edit-email");
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            name.forEach(el => {
                console.dir(el.parentElement.nextElementSibling.children[1].innerText);
                el.addEventListener("click", function replace() {
                    if (el.innerText == "Save") {
                        el.addEventListener("click", async function update() {
                            let name = el.previousElementSibling.value;
                            let email = el.parentElement.nextElementSibling.children[1].innerText;

                            let div = document.createElement("div");
                            div.innerText = el.previousElementSibling.value;

                            await fetch('/usersEdit', {
                                method: 'post',
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify({"name": name, "email": email})
                            })
                            .then(response => response.json())
                            .then(data => console.log(data))
                            .catch(function (error) {
                                console.log(error);
                            });
                        
                            el.previousElementSibling.remove();
                            el.before(div);
                            el.style.backgroundColor = "#ffc107";
                            el.style.borderColor = "#ffc107";
                            el.innerText = "Edit";
                            el.removeEventListener("click", update);
                        });
                    } else {
                        let input = document.createElement("input");
                        input.setAttribute("type", "text");
                        input.setAttribute("name", "userName");
                        input.setAttribute("value", el.previousElementSibling.innerText);
                        
                        el.previousElementSibling.remove();
                        el.before(input);
                        el.innerText = "Save";
                        el.style.backgroundColor = "green";
                        el.style.border = "none";
                    }
                });
            
            });

            email.forEach(el => {
                el.addEventListener("click", function replace() {
                    if (el.innerText == "Save") {
                        el.addEventListener("click", function update() {
                            let div = document.createElement("div");
                            div.innerText = el.previousElementSibling.value;

                            el.previousElementSibling.remove();
                            el.before(div);
                            el.style.backgroundColor = "#ffc107";
                            el.style.borderColor = "#ffc107";
                            el.innerText = "Edit";
                            el.removeEventListener("click", update);
                        });
                    } else {
                        let input = document.createElement("input");
                        input.setAttribute("type", "email");
                        input.setAttribute("name", "userName");
                        input.setAttribute("value", el.previousElementSibling.innerText);
                        
                        el.previousElementSibling.remove();
                        el.before(input);
                        el.innerText = "Save";
                        el.style.backgroundColor = "green";
                        el.style.border = "none";
                    }
                });
            
            });
        }, 1000
    )
</script> -->