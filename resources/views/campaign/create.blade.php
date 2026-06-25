<link rel="stylesheet" href="{{ asset('css/campaign.css') }}">

<div class="campaign-form-container">
    <form class="campaign-form"
          action="/campaign/store"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <h1>Create Campaign</h1>

        <div class="field">
            <label>Campaign Title</label>
            <input type="text"
                   name="title"
                   placeholder="Campaign Title"
                   value="{{ old('title') }}">
        </div>

        <div class="field">
            <label>Story</label>
            <textarea name="story"
                      placeholder="Campaign Story">{{ old('story') }}</textarea>
        </div>

        <div class="row">
            <div class="col field">
                <label>Target Amount</label>
                <input type="number"
                       name="target_amount"
                       placeholder="2500000"
                       value="{{ old('target_amount') }}">
            </div>

            <div class="col field">
                <label>Campaigner Name</label>
                <input type="text"
                       name="campaigner_name"
                       placeholder="Campaigner Name"
                       value="{{ old('campaigner_name') }}">
            </div>
        </div>

        <div class="row">
            <div class="col field">
                <label>Campaigner City</label>
                <input type="text"
                       name="campaigner_city"
                       placeholder="Mumbai"
                       value="{{ old('campaigner_city') }}">
            </div>

            <div class="col field">
                <label>Beneficiary Name</label>
                <input type="text"
                       name="beneficiary_name"
                       placeholder="Beneficiary Name"
                       value="{{ old('beneficiary_name') }}">
            </div>
        </div>

        <div class="row">
            <div class="col field">
                <label>Beneficiary Relation</label>
                <input type="text"
                       name="beneficiary_relation"
                       placeholder="Father / Mother / Friend"
                       value="{{ old('beneficiary_relation') }}">
            </div>

            <div class="col field">
                <label>Hospital Name</label>
                <input type="text"
                       name="hospital_name"
                       placeholder="Hospital Name"
                       value="{{ old('hospital_name') }}">
            </div>
        </div>

        <div class="field">
            <label>Campaign Images</label>
            <input type="file"
                   name="images[]"
                   multiple
                   accept="image/*">
        </div>

        <div class="actions">
            <button type="submit">
                Create Campaign
            </button>
        </div>

    </form>
</div>