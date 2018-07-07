@inject('couponShow', 'App\Presenters\CouponListPresenter')
<!--猜你喜欢 开始-->
<div class="mui-row lbd-guess-you-like">
  <h5 class="mui-text-center"><i class="mui-icon mui-icon-star"></i> 猜你喜欢</h5>
</div>
<!--商品列表 开始-->
<div class="mui-row lbd-goods-list" id="lbd-goods-list">
  <ul class="mui-table-view lbd-goods-list-info">
    @inject('material', 'App\Presenters\OptimusMaterialPresenter')
    @foreach($guessYouLikePinTuan as $key => $item)
      <li class="mui-table-view-cell mui-media">
        <a class="addPara" no='data{{ $key }}' href="{{ route('wx.itemInfo.pinTuanInfo') }}/{{ $item->num_iid }}">
          <data id="data{{ $key }}" link='{{ $material->getParaStrFromUrl($item->click_url) }}' pintuan="pintuan_info={{ $item->ostime }}and{{ $item->oetime }}and{{ $item->orig_price }}and{{ $item->jdd_price }}and{{ $item->item_description }}"></data>
          <div class="mui-row">
            <div class="mui-col-xs-4 goods-image">
              <img src="{{ $item->pict_url }}"/>
            </div>
            <div class="mui-col-xs-8 lbd-content">
              <p class="lbd-title">{{ $item->title }}</p>
            </div>
            <div class="mui-col-xs-8 lbd-content-more">
              <div class="lbd-top">
                @if($item->user_type == 1)
                <span class="lbd-from-tmall">天猫</span>
                @else
                <span class="lbd-from-taobao">淘宝</span>
                @endif
                <span class="lbd-from-new">{{ $item->jdd_num }}人团</span>
                {{ $item->sell_num }}人已拼团
              </div>
              <div class="lbd-bottom">
                <div class="mui-pull-left">
                  <div class="lbd-price-ori" style="text-decoration: none;">单买价￥{{ number_format($item->orig_price, 2) }}</div>
                  <div class="lbd-price-now" style="font-size: 15px;"><span class="lbd-m">拼团价￥</span>{{ number_format($item->jdd_price, 2) }}</div>
                </div>
                <div class="mui-pull-right">
                  <div class="lbd-coupon" style="padding: 7px 4px 0px;">
                    <span class="lbd-m" style="font-size: 12px;">省</span>{{ number_format($item->orig_price - $item->jdd_price, 2) }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </li>
    @endforeach
  </ul>
</div><!--商品列表 结束-->
