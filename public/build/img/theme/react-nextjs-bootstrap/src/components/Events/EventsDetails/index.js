"use client";

import { Row, Col, Card } from "react-bootstrap";
import Image from "next/image";
import EventInfo from "./EventInfo";
import AboutThisEvent from "./AboutThisEvent";
import Speakers from "./Speakers";

const EventsDetails = () => {
  return (
    <>
      <div className="mb-4">
        <Image
          src="/images/event-details.jpg"
          className="rounded-3"
          alt="event-details"
          width={1600}
          height={400}
        />
      </div>

      <Row>
        <Col lg={7}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <h3 className="mb-3 mb-lg-4">Event Details</h3>

              <h4 className="fs-14 fw-semibold mb-2 pb-1">
                Annual Conference 2024
              </h4>

              <p className="mb-4">
                The Annual Conference 2024 is a flagship event organized by ABC
                Corporation. This conference aims to bring together industry
                leaders, experts, and enthusiasts to discuss the latest trends,
                innovations, and challenges in our field. Participants can
                expect insightful keynote sessions, engaging panel discussions,
                and valuable networking opportunities field. Participants can
                expect insightful keynote sessions.
              </p>

              <Row>
                <Col sm={6} md={4} lg={6} xxl={4}>
                  <div className="d-flex align-items-center mb-4">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-35 d-inline-block wh-70 lh-70 text-center text-primary bg-gary-light rounded-circle bg-for-dark-mode">
                        schedule
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="fs-14 fw-semibold mb-1">Time</h4>
                      <span>01 Dec 2024, 09:00 AM</span>
                    </div>
                  </div>
                </Col>

                <Col sm={6} md={4} lg={6} xxl={4}>
                  <div className="d-flex align-items-center mb-4">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-35 d-inline-block wh-70 lh-70 text-center text-info bg-gary-light rounded-circle bg-for-dark-mode">
                        place
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="fs-14 fw-semibold mb-1">Location</h4>
                      <span>Convention Center</span>
                    </div>
                  </div>
                </Col>

                <Col sm={6} md={4} lg={6} xxl={4}>
                  <div className="d-flex align-items-center mb-4">
                    <div className="flex-shrink-0">
                      <span className="material-symbols-outlined fs-35 d-inline-block wh-70 lh-70 text-center text-primary-div bg-gary-light rounded-circle bg-for-dark-mode">
                        event_seat
                      </span>
                    </div>
                    <div className="flex-grow-1 ms-3">
                      <h4 className="fs-14 fw-semibold mb-1">TiEvent Seatme</h4>
                      <span>50</span>
                    </div>
                  </div>
                </Col>
              </Row>

              <div className="d-flex align-items-center flex-wrap gap-2 border-top pt-4">
                <button className="btn btn-primary fs-15 fw-medium py-2 px-4">
                  <div className="d-flex align-items-center py-1">
                    <span className="material-symbols-outlined fs-25 me-2 text-white">
                      local_activity
                    </span>

                    <span>Get Ticket</span>
                  </div>
                </button>

                <button className="btn btn-primary bg-transparent border fs-15 fw-medium py-2 px-4 text-body hover-bg">
                  <div className="d-flex align-items-center py-1">
                    <span className="material-symbols-outlined fs-25 me-2 text-white">
                      event
                    </span>

                    <span>Add To Calendar</span>
                  </div>
                </button>

                <button className="btn btn-primary bg-transparent border fs-15 fw-medium py-2 px-4 text-body hover-bg">
                  <div className="d-flex align-items-center py-1">
                    <span className="material-symbols-outlined fs-25 me-2 text-white">
                      favorite_border
                    </span>
                    <span>5937</span>
                  </div>
                </button>

                <button className="btn btn-primary bg-transparent border fs-15 fw-medium py-2 px-4 text-body hover-bg">
                  <div className="d-flex align-items-center py-1">
                    <span className="material-symbols-outlined fs-25 me-2 text-white">
                      share
                    </span>
                    <span>2582</span>
                  </div>
                </button>
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col lg={5}>
          <EventInfo />
        </Col>
      </Row>

      <Row>
        <Col lg={6}>
          <AboutThisEvent />
        </Col>

        <Col lg={6}>
          <Speakers />
        </Col>
      </Row>
    </>
  );
};

export default EventsDetails;
