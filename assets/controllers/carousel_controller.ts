import { Controller } from "@hotwired/stimulus";
import KeenSlider, { Container, KeenSliderInstance } from "keen-slider";

/* stimulusFetch: 'lazy' */
class CarouselController extends Controller {
    private sliderInstance!: KeenSliderInstance;

    connect() {
        this.sliderInstance = new KeenSlider(this.element as Container, {
            selector: ".slide",
            slides: {
                perView: 3,
                spacing: 24,
            },
            loop: true,
        });
    }

    async next(): Promise<void> {
        this.sliderInstance.next();
    }

    async prev(): Promise<void> {
        this.sliderInstance.prev();
    }
}

export default CarouselController;
