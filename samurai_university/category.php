<?php get_header(); ?>

    <!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
            <?php 
             $cat = get_the_category( );
             $catslug = $cat[0]->slug;
             $catname = $cat[0]->cat_name;
            ?>
            <div><?php echo $catslug;?></div>
            <div><?php echo $catname;?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course -->

    <div class="course">
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
                <div class="tab_panel_title"><?php echo $catname;?></div>
                <div class="tab_panel_content">
                  <div class="tab_panel_text">
                    <!-- news loop from here-->
                    <?php
                    // ページネーション（2ページ目以降）に対応させるための設定
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $category = get_queried_object();// 今のカテゴリ情報を取得
                    $cat_slug = isset($category->slug) ? $category->slug : ''; // 固定ページなどで特定のカテゴリを指定したい場合はスラッグを直接書く
                    // 記事を取得する条件の設定
                    $args = array(
                      'category_name'  => $category->slug,// 「今のカテゴリのslug」を使う
                      'posts_per_page' => 10,// 表示する件数
                      'orderby'        => 'date',// 日付順
                      'order'          => 'DESC', // 新しい順
                      'post_type'      => 'post',// 投稿タイプ
                      'paged'          => $paged,// ページ送り機能の有効化
                    );
// 「ニュース一覧ページ」に「イベント」のカテゴリーに振り分けられている記事が表示されないようなコーディング
                    // 'tax_query' => array(
                    //   array(
                    //    'taxonomy' => 'category', // カテゴリーについて調べます
                    //    'field'    => 'slug',     // IDではなくスラッグ名（event）で探します
                    //    'terms'    => 'event',    // 「event」という名前のやつを
                    //    'operator' => 'NOT IN',   // 【重要】「中に入れない（除外する）」
                    //   ),
                    // ),

                    // データの取得（ロボット作成）
                    $the_query = new WP_Query( $args );
                    if ( $the_query->have_posts() ) :
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                    ?>

                    <div class="news_posts_small">
                      <div class="row">
                        <div class="col-lg-2 col-md-2 col-sx-12">
                          <div class="calendar_news_border">
                            <div class="calendar_news_border_1">

                              <div class="calendar_month">
                                
                                <?php
                                  if(is_category('events')):
                                    echo post_custom('month');
                                  else:
                                    echo esc_html( get_post_time('F') );
                                  endif;
                                ?>
                              </div>

                              <div class="calendar_day">
                                <span>
                                <?php
                                  if(is_category('events')):
                                    echo post_custom('day');
                                  else:
                                    echo esc_html( get_post_time('d') );
                                  endif;
                                ?>
                                </span>
                              </div>

                            </div>
                          </div>
                          <!-- WP_Queryのループ内で「この記事がeventsかどうか」を判定する場合は in_category を使う -->
                          <?php
                          if(in_category('events')):?>
                          <div class="calender_hour"><?php echo post_custom( 'time' ); ?></div>
                          <?php endif; ?>

                        </div>
                        <div class="col-lg-10 col-md-10 col-sx-12">
                          <div class="news_post_small_title">
                            <!-- タイトルとリンクを入れる -->
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </div>
                          <div class="news_post_meta">
                            <ul>
                              <li>
                                <!-- 本文の抜粋を表示 (100文字で丸める) -->
                                <?php echo wp_trim_words( get_the_content(), 100, '...' ); ?>
                              </li>
                            </ul>
                          </div>
                          <div class="read_continue">
                            <button onclick="location.href='<?php the_permalink(); ?>'">詳細を見る</button>
                          </div>
                        </div>
                      </div>
                      <hr />
                    </div>

                    <?php
                      endwhile;?>
                    <!-- ページネーションの表示 -->
                    <div class="news_pagination">
                      <?php
                      // ページネーションのリンクを正しく生成(paginate_linksのクラス名がWordPressのテーマに対応していないので、別途style.cssで調整が必要⇒cssでの調整を行わなくていいクラス名は？)
                      echo paginate_links( array(
                        'base' => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ), // ページ番号のベースURL                     
                        'total' => $the_query->max_num_pages, // カスタムクエリの最大ページ数を指定(new WP_Query を使った場合、「こっちのクエリのページ数を使って！」 と指示する必要がある)
                        'current' => max( 1, $paged ), // 現在のページ番号を明示的に指定
                        'mid_size' => 1, // 現在のページの前後に表示するページ数
                        'prev_text' => '&lt;&lt;前へ', // 「前へ」テキスト
                        'next_text' => '次へ&gt;&gt;', // 「次へ」テキスト
                      ) );
                      ?>

                    </div>

                    <?php  
                      wp_reset_postdata();// データの片付け（必ずページネーションの後、if閉じの前に行う）
                    else :
                      echo '<p>ニュース記事が見つかりませんでした。</p>';
                    endif;
                    ?>
                    <!-- news loop until here-->
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
          <?php get_sidebar(); ?>
        </div>
      </div>
    </div>

<?php get_footer(); ?>