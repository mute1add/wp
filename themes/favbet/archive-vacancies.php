<?php
/**
 * The template for displaying archive pages for vacancies custom post type.
 */


get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="vacancies-main">

            <form method="get">
                <select id="sortby" name="sortby">
                    <option value="vacancies" <?php echo isset($_GET['sortby']) && $_GET['sortby'] == 'vacancies' ? 'selected' : ''; ?>>
                        Department
                    </option>
                    <option value="salary" <?php echo isset($_GET['sortby']) && $_GET['sortby'] == 'salary' ? 'selected' : ''; ?>>
                        Salary
                    </option>
                </select>
            </form>
            <div class="container-department">
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

                $args = array(
                    'post_type'      => 'vacancies',
                    'posts_per_page' => 8,
                    'post_status'    => 'publish',
                    'orderby'        => 'meta_value',
                    'meta_key'       => '_employee_department',
                    'order'          => 'ASC',
                    'paged'          => $paged,

                );

                if ( isset( $_GET['sortby'] ) && $_GET['sortby'] == 'salary' ) {
                    $args['meta_key'] = '_vacancy_salary';
                    $args['orderby']  = 'meta_value_num';
                    $args['order']    = 'ASC';
                }

                if ( isset( $_GET['sortby'] ) && $_GET['sortby'] == 'department' ) {
                    $args['meta_key'] = '_employee_department';
                    $args['orderby']  = 'meta_value';
                    $args['order']    = 'ASC';
                }

                $vacancies_query = new WP_Query( $args );




                if ($vacancies_query->have_posts()) :
                    while ($vacancies_query->have_posts()) : $vacancies_query->the_post();
                        get_template_part('content', 'vacancies');
                    endwhile;
                    wp_reset_postdata();
                else :
                    var_dump('none');
                endif;
                ?>
            </div>
            <?php
            echo favbet_blog_pagination($vacancies_query, $paged);


            get_template_part('content', 'none');
            ?>

        </main><!-- #main -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#sortby').on('change', function() {
                    $(this).closest('form').submit();
                });
            });
        </script>
    </div><!-- #primary -->
<?php
get_footer();
