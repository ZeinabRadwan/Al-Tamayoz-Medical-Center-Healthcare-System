<div class="search-bar">
    <div class="relative">
        <input type="search" name="search" id="search-input" class="search-input"
            placeholder="{{ $placeholder ?? 'Search...' }}" data-action="{{ $action ?? '' }}"
            data-model="{{ $model ?? '' }}">
        <button type="submit" class="search-btn text-white bg-green-700 rounded-lg text-sm px-5 py-2.5">
            ابحث
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <div id="search-results" class="search-results hidden">
            <!-- Search results will appear here -->
        </div>
    </div>
</div>


<style>
    /* Search Bar Styling */
    .search-bar {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 600px;
        /* Maximum width for search bar */
        margin: 0 auto;
    }

    .relative {
        position: relative;
        display: flex;
        width: 100%;
    }

    .search-input {
        width: 100%;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 50px;
        box-shadow: 0 0 1px rgba(24, 224, 44, 0.15), 0 6px 12px rgba(109, 210, 115, 0.15);
        border: 1px solid #ddd;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        padding-right: 40px;
        /* Space for the button */
    }

    .search-input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 4px rgba(40, 167, 69, 0.4);
        outline: none;
    }

    .search-btn {
        position: absolute;
        left: 5px;
        top: 50%;
        transform: translateY(-50%);
        background-color: var(--primary-color);
        color: white;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 16px;
        font-family: 'Lateef', serif;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .search-btn i {
        font-size: 14px;
        margin-left: 8px;
    }

    .search-btn:hover {
        background-color: var(--primary-color2);
        transform: scale(1.05);
    }

    /* Search Results Dropdown */
    .search-results {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        max-height: 300px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
    }

    .search-results div {
        padding: 10px;
        cursor: pointer;
        font-size: 14px;
    }

    .search-results div:hover {
        background-color: #f1f1f1;
    }

    /* Hide results when no search query */
    .hidden {
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const searchResults = document.getElementById('search-results');

        searchInput.addEventListener('input', function () {
            const query = searchInput.value.trim();
            const action = searchInput.getAttribute('data-action');
            const model = searchInput.getAttribute('data-model');

            if (query.length > 1) {
                fetch(`${action}?search=${query}&model=${model}`, {
                    method: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.results.length > 0) {
                            searchResults.style.display = 'block';
                            searchResults.innerHTML = data.results
                                .map(result => `<div data-id="${result.id}">${result.name ?? result.id_number ?? result.phone}</div>`)
                                .join('');
                        } else {
                            searchResults.style.display = 'none';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                searchResults.style.display = 'none';
            }
        });

        searchResults.addEventListener('click', function (e) {
            if (e.target && e.target.matches('div')) {
                // Add custom actions on selection, like populating the input with selected value
                // searchResults.style.display = 'none';
            }
        });
    });
</script>