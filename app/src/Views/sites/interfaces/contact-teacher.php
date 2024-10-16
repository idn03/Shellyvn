<style>
    .form-container__label { margin-top: 40px; }
    #problems,
    #description {
        margin-top: 16px;
        padding: 18px;
        border: none;
        
        border-radius: var(--bo-l);
    }

    #description {
        min-height: 200px;
        border-radius: var(--bo-l) var(--bo-l) 4px var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }
</style>

<section class="row justify-content-center form-container">
    <form action="/contact" method="post" class="col-lg-6">
        <label for="problems" class="space-top">What is your issue of concern?</label>
        <select name="problem" id="problems" class="form-select">
            <option value="bug" selected>System error</option>
            <option value="quote">Question</option>
            <option value="suggest">Suggestion</option>
            <option value="other">Other Issue</option>
        </select>

        <label for="description" class="space-top">Please describe your problem</label>
        <textarea name="des" id="description" placeholder="Type here..." class="form-control"></textarea>

        <div class="text-center">
            <button type="submit">SEND</button>
        </div>
    </form>
</section>