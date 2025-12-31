@extends('frontend.layouts.master')

@section('title', 'Language')

@section('content')

    <div class="language-container">

        <h2 class="heading">Preferred Languages</h2>
        <p class="sub-heading">Only content with the selected languages will be shown</p>

        <div class="lang-grid">

            <div class="lang-item" data-lang="Hindi" data-img="{{asset("assets/images/language/lan1.webp")}}">
                <div class="lang-circle"></div>
                <p class="lang-name">Hindi</p>
            </div>

            <div class="lang-item" data-lang="English" data-img="{{asset("assets/images/language/lan2.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">English</p>
            </div>
            <div class="lang-item" data-lang="Punjabi" data-img="{{asset("assets/images/language/lan3.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Punjabi</p>
            </div>
            <div class="lang-item" data-lang="Bhojpuri" data-img="{{asset("assets/images/language/lan4.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Bhojpuri</p>
            </div>
            <div class="lang-item" data-lang="Haryanvi" data-img="{{asset("assets/images/language/lan5.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Haryanvi</p>
            </div>
            <div class="lang-item" data-lang="Kannada" data-img="{{asset("assets/images/language/lan6.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Kannada</p>
            </div>
            <div class="lang-item" data-lang="Rajasthani" data-img="{{asset("assets/images/language/lan7.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Rajasthani</p>
            </div>
            <div class="lang-item" data-lang="Tamil" data-img="{{asset("assets/images/language/lan8.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Tamil</p>
            </div>
            <div class="lang-item" data-lang="Malayalam" data-img="{{asset("assets/images/language/lan9.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Malayalam</p>
            </div>
            <div class="lang-item" data-lang="Telugu" data-img="{{asset("assets/images/language/lan10.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Telugu</p>
            </div>
            <div class="lang-item" data-lang="Marathi" data-img="{{asset("assets/images/language/lan11.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Marathi</p>
            </div>
            <div class="lang-item" data-lang="Bengali" data-img="{{asset("assets/images/language/lan12.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Bengali</p>
            </div>
            <div class="lang-item" data-lang="Gujarati" data-img="{{asset("assets/images/language/lan13.webp")}}"">
                <div class="lang-circle"></div>
                <p class="lang-name">Gujarati</p>
            </div>

        </div>

        <button class="submit-btn">Submit</button>

    </div>
    <script>
        document.querySelectorAll('.lang-item').forEach(item => {
            const img = item.getAttribute('data-img');
            const circle = item.querySelector('.lang-circle');
            circle.style.backgroundImage = `url('${img}')`;
            const tick = document.createElement('span');
            tick.classList.add('tick');
            tick.innerHTML = `<i class="bi bi-check"></i>`;
            circle.appendChild(tick);
            item.addEventListener('click', () => {
                item.classList.toggle('selected');
            });
        });
    </script>

@endsection
