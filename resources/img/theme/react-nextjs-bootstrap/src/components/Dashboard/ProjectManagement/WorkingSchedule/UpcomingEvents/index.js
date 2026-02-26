"use client";

import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination } from "swiper/modules";

const UpcomingEvents = () => {
  return (
    <>
      <div className="upcoming-events mt-4 position-relative">
        <div className="d-flex justify-content-between align-items-center mt-3 mt-sm-0 mb-3">
          <span className="fw-medium">Upcoming Events:</span>
        </div>

        <Swiper
          spaceBetween={30}
          pagination={{
            clickable: true,
          }}
          modules={[Pagination]}
          className="upcoming-events-slide z-0"
        >
          <SwiperSlide>
            <div className="position-relative d-flex">
              <span className="wh-11 bg-primary rounded-1 d-inline-block position-relative top-1"></span>

              <div>
                <h4 className="fs-12 fw-semibold text-secondary mb-0 ms-1">
                  {" "}
                  Pythons Unleashed: A Development Expedition
                </h4>
                <p className="fs-12">
                  <span className="text-primary">April 15, 2024</span> - 12.00
                  PM - 6.00 PM
                </p>
              </div>
            </div>
          </SwiperSlide>

          <SwiperSlide>
            <div className="position-relative d-flex">
              <span className="wh-11 bg-primary rounded-1 d-inline-block position-relative top-1"></span>
              <div>
                <h4 className="fs-12 fw-semibold text-secondary mb-0 ms-1">
                  {" "}
                  Big Data Analytics
                </h4>
                <p className="fs-12">
                  <span className="text-primary">15 Mar 2024</span> - 01.00 PM -
                  7.00 PM
                </p>
              </div>
            </div>
          </SwiperSlide>

          <SwiperSlide>
            <div className="position-relative d-flex">
              <span className="wh-11 bg-primary rounded-1 d-inline-block position-relative top-1"></span>
              <div>
                <h4 className="fs-12 fw-semibold text-secondary mb-0 ms-1">
                  Introduction to Blockchain
                </h4>
                <p className="fs-12">
                  <span className="text-primary">10 Mar 2024</span> - 02.00 PM -
                  9.00 PM
                </p>
              </div>
            </div>
          </SwiperSlide>
        </Swiper>
      </div>
    </>
  );
};

export default UpcomingEvents;
