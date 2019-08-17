class CatalogFilter {

    constructor(baseUrl) {
        this.baseUrl = baseUrl;

        this.filter = {
            orderBy: null,
            intCatID: null,
            term: null,
        };

        this.addEvents();
    }

    addEvents() {
        let self = this;

        let sortButtons = document.querySelectorAll('.catalog-sort-filter');

        for (let sortButton of sortButtons) {
            sortButton.addEventListener('click', function () {
                let sortBy = this.getAttribute('data-sort');

                if (sortBy !== self.filter.orderBy) {
                    self.filter.orderBy = sortBy;
                    self.submitFilter();
                }
            });
        }

        let categoriesButtons = document.querySelectorAll('.catalog-category-filter');

        for (let categoryButton of categoriesButtons) {
            categoryButton.addEventListener('click', function () {
                let intCatID = this.getAttribute('data-category');

                if (intCatID !== self.filter.intCatID) {
                    self.filter.intCatID = intCatID;
                    self.submitFilter();
                }
            });
        }
    }

    submitFilter() {
        let filterParts = [];

        for (let filterKey of Object.keys(this.filter)) {
            if (CatalogFilter.checkValidFilter(this.filter[filterKey])) {
                filterParts.push(`${filterKey}=${this.filter[filterKey]}`);
            }
        }

        let url = this.baseUrl;

        if (filterParts.length > 0) {
            url += '?' + filterParts.join('&');
        }

        document.location.href = url;
    }

    setFilters(filtersJson) {
        let filters = JSON.parse(filtersJson);

        for (let filterKey of Object.keys(filters)) {
            if (this.filter.hasOwnProperty(filterKey) && CatalogFilter.checkValidFilter(filters[filterKey])) {
                this.filter[filterKey] = filters[filterKey];
            }
        }
    }

    static checkValidFilter(value) {
        try {
            return !(value === null || value === undefined || value.length === 0);
        } catch (e) {
            return false;
        }
    }
}
