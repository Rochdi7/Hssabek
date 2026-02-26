"use client";

import { Row, Col, Card, ProgressBar } from "react-bootstrap";
import Link from "next/link";
import Image from "next/image";

const EventsGrid = () => {
  return (
    <>
      <Row>
        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-1.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Annual Conference 2024
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-6.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-7.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-8.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-9.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">1156</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={85}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-2.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Leadership Summit 2024
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-10.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-11.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">556</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={30}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-1.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Product Launch Webinar
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-12.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-13.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-14.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">356</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={60}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-4.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                AI in Healthcare Symposium
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-15.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">3226</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={70}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-5.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Tech Summit 2024
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-16.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-17.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">4109</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={50}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-6.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Startup Pitch Day
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-18.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-19.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-20.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">432</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={40}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-7.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Workshop: Digital Marketing
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-21.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">1728</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={60}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-8.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Charity Gala Dinner
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-22.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-23.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-24.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-25.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">1306</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={90}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-9.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Web Development Seminar
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-26.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-27.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">2756</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={50}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-10.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Networking Mixer
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-28.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>

                <li className="ms-m-15">
                  <Image
                    src="/images/user-29.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">1467</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={85}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-1.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Annual Conference 2024
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-6.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-7.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-8.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">799</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={90}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={6} xl={4} xxl={3}>
          <Card className="bg-white border-0 rounded-3 mb-4 transition-y">
            <Card.Body className="p-4">
              <div className="position-relative mb-3">
                <Link href="/events/details">
                  <Image
                    src="/images/event-2.jpg"
                    className="rounded-3"
                    alt="event"
                    width={700}
                    height={467}
                  />
                </Link>
                <div className="bg-white pb-2 ps-2 position-absolute top-0 end-0 rounded-3 rounded-top-0 rounded-end-0 bg-for-dark-mode">
                  <span className="wh-60 lh-60 bg-primary hover-bg d-inline-block text-white text-center rounded-3 fs-16 fw-bold">
                    $120
                  </span>
                </div>
              </div>

              <Link
                href="/events/details"
                className="text-secondary text-decoration-none fs-18 fw-bold hover d-block mb-2"
              >
                Leadership Summit 2024
              </Link>

              <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry standard dummy text.
              </p>

              <ul className="ps-0 mb-4 list-unstyled d-flex align-items-center">
                <li className="ms-m-15">
                  <Image
                    src="/images/user-10.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-11.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-12.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
                <li className="ms-m-15">
                  <Image
                    src="/images/user-13.jpg"
                    className="wh-40 rounded-circle border border-2 border-color-white"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </li>
              </ul>

              <div>
                <div className="d-flex justify-content-between mb-2">
                  <span className="d-block">Seat Booked</span>
                  <span className="fw-medium d-block text-secondary">3241</span>
                </div>

                <ProgressBar
                  variant="primary"
                  now={40}
                  style={{ height: "4px" }}
                />
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col sm={12} xl={12} xxl={12}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
                <span>Showing 12 of 30 Results</span>

                <nav aria-label="Page navigation example">
                  <ul className="pagination mb-0 justify-content-center">
                    <li className="page-item">
                      <Link
                        className="page-link icon"
                        href="#"
                        aria-label="Previous"
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_left
                        </span>
                      </Link>
                    </li>
                    <li className="page-item">
                      <Link className="page-link active" href="#">
                        1
                      </Link>
                    </li>
                    <li className="page-item">
                      <Link className="page-link" href="#">
                        2
                      </Link>
                    </li>
                    <li className="page-item">
                      <Link className="page-link" href="#">
                        3
                      </Link>
                    </li>
                    <li className="page-item">
                      <Link className="page-link" href="#">
                        4
                      </Link>
                    </li>
                    <li className="page-item">
                      <Link
                        className="page-link icon"
                        href="#"
                        aria-label="Next"
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_right
                        </span>
                      </Link>
                    </li>
                  </ul>
                </nav>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default EventsGrid;
