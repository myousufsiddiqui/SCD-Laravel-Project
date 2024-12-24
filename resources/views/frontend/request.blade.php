<x-web-layout>







<div class="sourcing-total">
        <!-- Sourcing Heading -->
        <h2 class="sourcing-heading">Request Product Sourcing</h2>
    
        <!-- Sourcing Steps Section -->
        <section class="sourcing-steps">
            <div class="sourcing-step">
                <img src="./images/icon1.png" alt="Step 1 Icon">
                <p>Enter sourcing <br>information</p>
            </div>
            <div class="sourcing-step">
                <img src="./images/icon2.png" alt="Step 2 Icon">
                <p>Quick quotation <br>response</p>
            </div>
            <div class="sourcing-step">
                <img src="./images/icon3.png" alt="Step 3 Icon">
                <p>View quotations <br>from DS</p>
            </div>
        </section>
    
        <!-- Sourcing Form Section -->
        <section class="sourcing-section">
            <div class="sourcing-form">
            <form action="{{ route('request_form') }}" method="POST">
            @csrf
                    <input type="text" name="name" placeholder="Product Title" required>
                    
                    <!-- Image Upload Section 
                    <div class="file-upload">
                        <label for="image">Product Image (JPG, JPEG, PNG, HEIF)</label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png, .heif" required>
                    </div>-->
    
                    <!-- Target Price Section -->
                    <input type="number" name="target_price" placeholder="Target Price (USD)" min="0" step="0.01" required>
    
                    <!-- Sourcing URL Section -->
                    <input type="text" name="sourcing_url" placeholder="Sourcing URL" required>
                    
                    <!-- Description Section -->
                    <textarea name="description" rows="5" placeholder="Description" required></textarea>
    
                    <!-- Submit Button -->
                    <button type="submit">Request Sourcing</button>
                </form>
            </div>
        </section>
    </div>
</x-web-layout>