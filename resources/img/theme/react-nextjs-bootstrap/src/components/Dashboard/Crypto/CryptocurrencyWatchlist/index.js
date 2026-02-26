"use client";

import Bitcoin from "./Bitcoin";
import Ethereum from "./Ethereum";
import Solana from "./Solana";
import Binance from "./Binance";
import Cardano from "./Cardano";
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper/modules";

const CryptocurrencyWatchlist = () => {
  return (
    <>
      <div className="mb-4">
        <h3 className="mb-4">Cryptocurrency Watch List</h3>

        <Swiper
          slidesPerView={1}
          spaceBetween={10}
          pagination={{
            clickable: true,
          }}
          autoplay={{
            delay: 5000,
            pauseOnMouseEnter: true,
            disableOnInteraction: false,
          }}
          breakpoints={{
            0: {
              slidesPerView: 1,
            },
            768: {
              slidesPerView: 2,
            },
            992: {
              slidesPerView: 3,
            },
            1400: {
              slidesPerView: 4,
            },
          }}
          modules={[Pagination, Autoplay]}
          className="cryptocurrency-slider"
          style={{ zIndex: "0" }}
        >
          <SwiperSlide>
            <Bitcoin />
          </SwiperSlide>

          <SwiperSlide>
            <Ethereum />
          </SwiperSlide>

          <SwiperSlide>
            <Solana />
          </SwiperSlide>

          <SwiperSlide>
            <Binance />
          </SwiperSlide>

          <SwiperSlide>
            <Cardano />
          </SwiperSlide>
        </Swiper>
      </div>
    </>
  );
};

export default CryptocurrencyWatchlist;
