"use client";

import { Card } from "react-bootstrap";
import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper/modules";
import { useState } from "react";

const UpcomingEvents = () => {
  // Sample dynamic event data
  const [events] = useState([
    {
      name: "Science Fair",
      date: "November 25, 2024",
      time: "9:00 AM - 3:00 PM",
      location: "Auditorium",
    },
    {
      name: "Science Fair",
      date: "November 28, 2024",
      time: "9:00 AM - 3:00 PM",
      location: "California",
    },
    {
      name: "Math Olympiad",
      date: "December 2, 2024",
      time: "10:00 AM - 4:00 PM",
      location: "Main Hall",
    },
    {
      name: "Art Exhibition",
      date: "December 10, 2024",
      time: "11:00 AM - 5:00 PM",
      location: "Gallery Room 3",
    },
  ]);

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4 z-0">
        <div
          className="custom-padding-30"
          style={{ paddingTop: "23px", paddingBottom: "23px" }}
        >
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-1 pb-3">
            <h3 className="mb-0 fw-semibold">Upcoming Events</h3>
          </div>

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
            modules={[Pagination, Autoplay]}
            className="upcoming-events-slide-two"
          >
            {events.map((event, index) => (
              <SwiperSlide key={index}>
                <div
                  className="bg-body-bg p-3 rounded-3"
                  style={{ marginTop: "2px" }}
                >
                  <div className="d-flex flex-wrap gap-1 justify-content-between mb-1">
                    <span className="text-secondary fs-16 fw-medium">
                      {event.name}
                    </span>
                    <span>{event.date}</span>
                  </div>
                  <div className="d-flex flex-wrap gap-1 justify-content-between">
                    <span className="text-secondary d-flex align-items-center">
                      <i className="ri-time-line fs-16 me-2"></i>
                      <span>{event.time}</span>
                    </span>
                    <span className="text-secondary d-flex align-items-center">
                      <i className="ri-map-pin-line fs-16 me-2"></i>
                      <span>{event.location}</span>
                    </span>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </Card>
    </>
  );
};

export default UpcomingEvents;
