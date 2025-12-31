<!-- OTT Logos Row -->
<div class="live-section">
    <div class="live-scroll-container">
        <button class="scroll-btn left-btn">❮</button>

        <div class="live-scroller">
            <div class="live-scroll-inner">

                @foreach ($otts as $ott)
                    <div class="live-card-wrapper">
                        <a href="{{ route('ott.show', $ott->id) }}">
                            <div class="live-card">
                                <img
                                    src="{{ asset($ott->logo_url) }}"
                                    alt="{{ $ott->name }}">
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

        <button class="scroll-btn right-btn">❯</button>
    </div>
</div>
