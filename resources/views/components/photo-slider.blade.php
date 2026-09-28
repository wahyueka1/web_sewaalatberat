@props(['photos', 'fallbackUrl', 'alt'])

<div class="photo-slider mb-6">
    <div class="relative rounded-xl overflow-hidden mb-3 bg-gray-100">
        <div class="slider-track flex transition-transform duration-300 ease-in-out">
    @forelse($photos as $photo)
        <img src="{{ $photo->url }}" alt="{{ $alt }}" class="w-full h-72 sm:h-96 object-contain bg-gray-100 flex-shrink-0">
    @empty
        <img src="{{ $fallbackUrl }}" alt="{{ $alt }}" class="w-full h-72 sm:h-96 object-contain bg-gray-100 flex-shrink-0">
    @endforelse
</div>

        @if($photos->count() > 1)
            <button type="button" class="slider-prev absolute left-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-9 h-9 flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 15.707a1 1 0 01-1.414 0l-5-5a1 1 0 010-1.414l5-5a1 1 0 111.414 1.414L8.414 10l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
            <button type="button" class="slider-next absolute right-2 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white rounded-full w-9 h-9 flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 4.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L11.586 10 7.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>

            <div class="slider-dots absolute bottom-2 left-1/2 -translate-x-1/2 flex gap-1.5">
                @foreach($photos as $index => $photo)
                    <button type="button" class="slider-dot w-2 h-2 rounded-full bg-white/60"></button>
                @endforeach
            </div>
        @endif
    </div>

    @if($photos->count() > 1)
        <div class="slider-thumbs grid grid-cols-4 sm:grid-cols-5 gap-2">
            @foreach($photos as $photo)
                <button type="button" class="slider-thumb-btn">
                    <img src="{{ $photo->url }}" alt="{{ $alt }}" class="w-full h-16 object-cover rounded-lg border-2 border-transparent">
                </button>
            @endforeach
        </div>
    @endif
</div>

@once
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.photo-slider').forEach(function (root) {
                const track = root.querySelector('.slider-track');
                const slides = track ? track.children : [];
                if (!track || slides.length <= 1) return;

                let current = 0;
                const dots = root.querySelectorAll('.slider-dot');
                const thumbBtns = root.querySelectorAll('.slider-thumb-btn');
                const prevBtn = root.querySelector('.slider-prev');
                const nextBtn = root.querySelector('.slider-next');

                function goTo(index) {
                    current = (index + slides.length) % slides.length;
                    track.style.transform = `translateX(-${current * 100}%)`;

                    dots.forEach((dot, i) => {
                        dot.classList.toggle('bg-white', i === current);
                        dot.classList.toggle('bg-white/60', i !== current);
                    });

                    thumbBtns.forEach((btn, i) => {
                        btn.firstElementChild.classList.toggle('border-green-500', i === current);
                        btn.firstElementChild.classList.toggle('border-transparent', i !== current);
                    });
                }

                prevBtn && prevBtn.addEventListener('click', () => goTo(current - 1));
                nextBtn && nextBtn.addEventListener('click', () => goTo(current + 1));
                dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));
                thumbBtns.forEach((btn, i) => btn.addEventListener('click', () => goTo(i)));

                goTo(0);

                let autoplay = setInterval(() => goTo(current + 1), 5000);
                root.addEventListener('mouseenter', () => clearInterval(autoplay));
                root.addEventListener('mouseleave', () => autoplay = setInterval(() => goTo(current + 1), 5000));
            });
        });
    </script>
    @endpush
@endonce