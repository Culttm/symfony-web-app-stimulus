import { Controller } from "@hotwired/stimulus";

/* stimulusFetch: 'lazy' */
class ClipboardController extends Controller {
    static targets = ["source"];

    private sourceTarget: HTMLInputElement;

    private async copy(): Promise<void> {
        return navigator.clipboard.writeText(this.sourceTarget.value);
    }
}

export default ClipboardController;
