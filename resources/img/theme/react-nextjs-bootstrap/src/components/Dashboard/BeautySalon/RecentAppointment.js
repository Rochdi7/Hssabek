"use client";

import { Card, Row, Col } from "react-bootstrap";
import Image from "next/image";
import { useEffect, useState } from "react";
import Calendar from "react-calendar";

const appointmentsData = [
  {
    id: 1,
    time: "10:00 AM",
    service: "Pedicure Treatment",
    status: "Done",
    statusColor: "#1e8308",
    statusBgColor: "#D8FFC8",
    client: {
      name: "Jonathon Ronan",
      image: "/images/user-81.png",
    },
    servedBy: {
      name: "Zinia Andy",
      image: "/images/user-80.png",
    },
    backgroundColor: "#DDE4FF",
    verifyIcon: "/images/verify-3.svg",
  },
  {
    id: 2,
    time: "11:00 AM",
    service: "Facial Treatment",
    status: "Upcoming",
    statusColor: "#3E2AD8",
    statusBgColor: "#DDE4FF",
    client: {
      name: "Angela Carter",
      image: "/images/user-106.png",
    },
    servedBy: {
      name: "Skyler White",
      image: "/images/user-107.png",
    },
    backgroundColor: "#F3E8FF",
    verifyIcon: "/images/verify-border.svg",
  },
  {
    id: 3,
    time: "12:00 PM",
    service: "Hair Cut",
    status: "Done",
    statusColor: "#1e8308",
    statusBgColor: "#D8FFC8",
    client: {
      name: "Jane Ronan",
      image: "/images/user-81.png",
    },
    servedBy: {
      name: "Zinia Andy",
      image: "/images/user-80.png",
    },
    backgroundColor: "#DDE4FF",
    verifyIcon: "/images/verify-3.svg",
  },
  {
    id: 4,
    time: "01:00 PM",
    service: "Manicure",
    status: "Upcoming",
    statusColor: "#3E2AD8",
    statusBgColor: "#DDE4FF",
    client: {
      name: "Angel Peril",
      image: "/images/user-106.png",
    },
    servedBy: {
      name: "Skyler White",
      image: "/images/user-107.png",
    },
    backgroundColor: "#F3E8FF",
    verifyIcon: "/images/verify-border.svg",
  },
];

const RecentAppointment = () => {
  const [currentDate, setCurrentDate] = useState("");

  // Function to format the current date
  const formatDate = (date) => {
    const options = { day: "numeric", month: "short", year: "numeric" };
    return new Intl.DateTimeFormat("en-US", options).format(date);
  };

  // Set the current date on component mount
  useEffect(() => {
    const today = new Date();
    setCurrentDate(formatDate(today));
  }, []);

  const [value, setValue] = useState(new Date());

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="calendar-container">
            <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3 mb-lg-30">
              <h3 className="fs-18 fw-semibold letter-spacing-1 mb-0">
                Recent Appointment
              </h3>
              <div>
                <div className="d-flex align-items-center bg-border-color py-2 px-3 rounded-2 for-dark-digital-date">
                  {currentDate}
                  <i className="ri-calendar-2-line ms-2"></i>
                </div>
              </div>
            </div>

            <Row>
              <Col sm={6}>
                <Calendar
                  onChange={setValue}
                  value={value}
                  className={"ra-calendar"}
                />
              </Col>

              <Col sm={6}>
                <div
                  className="mt-4 mt-sm-0 bs-rs-appointments"
                  style={{
                    maxHeight: "291px",
                    overflowY: "auto",
                  }}
                >
                  <div className="bs-rs-appointments-list">
                    {appointmentsData.map((appointment) => (
                      <div
                        key={appointment.id}
                        className="p-4 rounded-3 mb-4 position-relative"
                        style={{
                          backgroundColor: appointment.backgroundColor,
                        }}
                      >
                        <div className="d-flex flex-wrap gap-1 justify-content-between align-items-start">
                          <div>
                            <span
                              className="fw-semibold d-block mb-1 text-000" 
                            >
                              {appointment.time}
                            </span>
                            <h4 className="fs-14 text-body">
                              {appointment.service}
                            </h4>
                          </div>
                          <span
                            className="bg-opacity-10 fs-12 px-2 rounded-pill d-inline-block"
                            style={{
                              backgroundColor: appointment.statusBgColor,
                              border: `1px solid ${appointment.statusColor}`,
                              color: appointment.statusColor,
                            }}
                          >
                            {appointment.status}
                          </span>
                        </div>

                        <div className="d-flex flex-wrap gap-1 justify-content-between align-items-center">
                          <div className="d-flex align-items-center gap-2">
                            <div className="flex-shrink-0">
                              <Image
                                src={appointment.client.image}
                                className="rounded-circle border border-2 border-color-white position-relative top-2"
                                alt="client"
                                width={26}
                                height={26}
                              />
                            </div>
                            <div className="flex-grow-1">
                              <span className="fs-10 fw-medium">Client</span>
                              <h4 className="fs-12 fw-semibold text-body mb-0">
                                {appointment.client.name}
                              </h4>
                            </div>
                          </div>

                          <div className="d-flex align-items-center gap-2">
                            <div className="flex-shrink-0">
                              <Image
                                src={appointment.servedBy.image}
                                className="rounded-circle border border-2 border-color-white position-relative top-2"
                                alt="served-by"
                                width={26}
                                height={26}
                              />
                            </div>
                            <div className="flex-grow-1">
                              <span className="fs-10 fw-medium">Served by</span>
                              <h4 className="fs-12 fw-semibold text-body mb-0">
                                {appointment.servedBy.name}
                              </h4>
                            </div>
                          </div>
                        </div>

                        <Image
                          src={appointment.verifyIcon}
                          className="verifyIcon bg-white position-absolute top-50 start-0 translate-middle"
                          alt="verify"
                          width={24}
                          height={24}
                        />
                      </div>
                    ))}
                  </div>
                </div>
              </Col>
            </Row>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default RecentAppointment;
