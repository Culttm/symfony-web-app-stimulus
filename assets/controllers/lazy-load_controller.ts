import { Controller } from "@hotwired/stimulus";

/* stimulusFetch: 'lazy' */
class LazyLoadController extends Controller {
    static values = { url: String };
    static targets = ["output"];

    protected outputTarget: HTMLDivElement;
    protected urlValue: string;

    async connect() {
        await this.load();
    }

    async load(): Promise<void> {
        const response = await fetch(this.urlValue);
        this.outputTarget.innerHTML = await response.text();
    }
}

export default LazyLoadController;
