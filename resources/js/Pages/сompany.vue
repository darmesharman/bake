
<template>
<div >
    companiesf
    <div v-if="this.$store.state.hascompanies_data"   >
        <div v-for="(company, index) in this.$store.state.companies" :key="index" >
            <!-- {{index}} -->
            <!-- {{company}} -->

            <article class="catalog-item line">
                <div class="content">

                <!-- <img height="200px" width="200px" style="background-image: url('../images/HlgZihTyFOE.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; background-size:contain;"> -->

                    <a class="image bg-cov" href="" style="background-image: url('../images/HlgZihTyFOE.jpg');">
                            <div class="images-count icon-picture"> $company->company_images_count }}</div>
                    </a>
                    <div class="info">

                        <div class="title">
                            <h5 class="theme-hov">
                                <!-- <a href=" route('companies.show', $company) }}"
                                    rel="bookmark">
                                        $company->name }}
                                </a> -->
                                <a href="">{{company.name}}</a>
                            </h5>
                            <p class="icon-place"> {{company.city.name }}</p>
                            <!-- <p class="icon-place"> $company->city->name }}</p> -->
                        </div>

                        <p class="desc">
                            {{company.short_description}} <span style="color: silver">...</span>
                            <!-- @if (strlen($company->short_description) > 100)
                                    substr($company->short_description, 0, 100) }} <span style="color: silver">...</span>
                            @else
                                    $company->short_description }}
                            @endif -->

                        </p>

                        <div class="bottom">
                            <div class="tags small square">
                                <div class="line">
                                    <a href="" class="tag">{{ company.category.name }}</a>
                                    <a href="#" class="tag"> {{ company.city.name }}</a>
                                    <!-- <a href="#" class="tag"> $company->category->name }}</a> -->
                                    <!-- <a href="#" class="tag"> $company->city->name }}</a> -->
                                    
                                </div>
                            </div>
                            
                            <div class="rating">
                                <ul class="star-rating">
                                    <p style='display:none'> {{ company.rating }}</p>

                                    <!-- <p style='display:none'> $rating = $company->rating }}</p> -->
                                    <!-- @foreach(range(1, 5) as $star)
                                        <li class="
                                            @if($rating - 2 >= 0)
                                                    active
                                                        $rating -= 2 }}
                                            @elseif($rating - 1 >= 0)
                                                    half
                                                        $rating -= 1 }}
                                            @endif
                                            ">
                                        </li>
                                    @endforeach -->
                                </ul>
                                <div class="total">
                                    <span class="grey-text"> {{ company.rating }}</span>
                                </div>
                                <!-- <div class="total">
                                    <span class="grey-text"> $company->rating }}</span>
                                </div> -->
                            </div>
                        </div>

                    </div>

                </div>
            </article>


        </div> 
    </div>
       
   

    <div class="text-center border">clear</div>
    

        
    </div>
</template>


<script>

    export default {
        props: {
        },
        components: {
        },
        sockets: {
           
        },
        methods: {

      },
  mounted() {
      this.$store.dispatch('fetchCompanies');

  }
}
</script>


<style scoped>

</style>
