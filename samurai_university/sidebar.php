<!-- sidebar-main に切り出す -->
          <div class="sidebar">
            <div class="category">
              <div class="section_title_container category_title">
                <h2>CATEGORY</h2>
                <div class="section_subtitle">カテゴリー</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                  <?php
                   $argc = array(
                     'title_li' => '', // タイトルを非表示にする
                     'show_count' => false, // 投稿数を表示する
                     'orderby' => 'name', // 名前順にソート
                     'order' => 'ASC', // 昇順
                     'hide_empty' => true, // 投稿がないカテゴリーは非表示にする
                   );
                   wp_list_categories($argc);
                  ?>
                </ul>
              </div>
            </div>
            <div class="category">
              <div class="section_title_container category_title">
                <h2>Latest Post</h2>
                <div class="section_subtitle">最新記事</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                  <?php
                //    $args = array(・・・);　$latest_posts = new WP_Query( $args );と分けて書く方法でもOKだが、ここでは変数を直接書く方法で。
                   $latest_posts = new WP_Query(array(
                     'posts_per_page' => 3, // 最新記事3件を取得
                     'post_type' => 'post', // 投稿タイプ
                     'orderby' => 'date', // 日付順
                     'order' => 'DESC', // 新しい順
                   ));
                   if ($latest_posts->have_posts()) :
                     while ($latest_posts->have_posts()) : $latest_posts->the_post();
                  ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                  <?php
                     endwhile;
                     wp_reset_postdata(); // クエリのリセット
                   endif;
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <!-- sidebar-main ここまで -->