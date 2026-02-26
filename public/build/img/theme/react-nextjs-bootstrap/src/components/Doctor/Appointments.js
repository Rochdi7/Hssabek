"use client";

import React, { useState } from "react";
import Image from "next/image";
import Calendar from "react-calendar";
import { Row, Col, Card, Form, Button } from "react-bootstrap";

const Appointments = () => {
  const [value, setValue] = useState(new Date());

  // State to manage appointments
  const [appointments] = useState([
    {
      id: 1,
      time: "10:00 AM",
      title: "Appointment With Cardiac Patient",
      patientName: "Jonathon Ronan",
      patientImage: "/images/user-145.png",
      backgroundColor: "#DDE4FF",
      buttonColor: "primary",
      status: "Scheduled",
    },
    {
      id: 2,
      time: "12:00 PM",
      title: "Board Meeting With",
      patientName: "Jessy Pinkman",
      patientImage: "/images/user-146.png",
      backgroundColor: "#C8FFE1",
      buttonColor: "success",
      status: "Scheduled",
    },
    {
      id: 3,
      time: "02:00 PM",
      title: "Appointment With Cardiac Patient",
      patientName: "Walter White",
      patientImage: "/images/user-147.png",
      backgroundColor: "#DAEBFF",
      buttonColor: "card-bg-c",
      status: "Upcoming",
    },
    {
      id: 4,
      time: "03:00 PM",
      title: "Appointment With Cardiac Patient",
      patientName: "Jonathon Ronan",
      patientImage: "/images/user-148.png",
      backgroundColor: "#DDE4FF",
      buttonColor: "success",
      status: "Upcoming",
    },
    {
      id: 5,
      time: "04:00 PM",
      title: "Board Meeting With",
      patientName: "Jessy Pinkman",
      patientImage: "/images/user-149.png",
      backgroundColor: "#C8FFE1",
      buttonColor: "primary",
      status: "Upcoming",
    },
  ]);

  // Add A Schedule Modal
  const [isScheduleModal, setScheduleModal] = useState("false");
  const handleToggleScheduleModal = () => {
    setScheduleModal(!isScheduleModal);
  };

  // Schedule Details Modal
  const [isScheduleDetailsModal, setScheduleDetailsModal] = useState("false");
  const handleToggleScheduleDetailsModal = () => {
    setScheduleDetailsModal(!isScheduleDetailsModal);
  };

  return (
    <>
      <Row>
        <Col md={4}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <div className="calendar-container style-two">
                <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-3 mb-lg-4">
                  <h3 className="fs-18 fw-semibold letter-spacing-1 mb-0">
                    Today’s Schedule
                  </h3>
                </div>

                <Calendar onChange={setValue} value={value} />
              </div>
            </Card.Body>
          </Card>

          <button
            className="btn btn-primary fs-16 fw-medium py-2 px-3 mb-4"
            onClick={handleToggleScheduleModal}
          >
            <div className="d-flex align-items-center py-1">
              <i className="ri-add-line position-relative top-1 me-2 text-white fs-18"></i>
              <span>Add A Schedule</span>
            </div>
          </button>
        </Col>

        <Col md={8}>
          <Card className="bg-white border-0 rounded-3 mb-4">
            <Card.Body className="p-4">
              <h3 className="fs-18 mb-4">Today’s Appointment</h3>
              <div
                className="mt-4 mt-sm-0 px-3"
                style={{
                  maxHeight: "1080px",
                  overflowY: "auto",
                }}
              >
                <div className="recent-appointment-notify">
                  {appointments.map((appointment) => (
                    <div
                      key={appointment.id}
                      className="mb-4 position-relative"
                    >
                      <div
                        className="p-4 rounded-3 position-relative"
                        style={{
                          backgroundColor: appointment.backgroundColor,
                        }}
                      >
                        <div className="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                          <div>
                            <div className="d-flex align-items-center mb-2 gap-2">
                              <span className="fs-14 fw-semibold text-000 d-block">
                                {appointment.time}
                              </span>
                              {appointment.status === "Upcoming" && (
                                <>
                                  <div
                                    className="text-center rounded-circle"
                                    style={{
                                      width: "28px",
                                      height: "28px",
                                      lineHeight: "34px",
                                      backgroundColor: "#6560F0",
                                    }}
                                  >
                                    <span className="material-symbols-outlined fs-18 text-white">
                                      notifications
                                    </span>
                                  </div>
                                  <span className="bg-white px-2 border border-primary d-inline-block text-primary rounded-pill fs-12 fw-medium">
                                    Upcoming
                                  </span>
                                </>
                              )}
                            </div>
                            <div>
                              <span className="d-block mb-3">
                                {appointment.title}
                              </span>
                              <div className="d-flex">
                                <Image
                                  src={appointment.patientImage}
                                  className="rounded-circle border border-2 border-white"
                                  alt="user"
                                  width={24}
                                  height={24}
                                />
                                <span className="fs-14 fw-semibold text-000 ms-10">
                                  {appointment.patientName}
                                </span>
                              </div>
                            </div>
                          </div>

                          <button
                            className={`btn bg-white text-${appointment.buttonColor} fs-14 fw-semibold`}
                            onClick={handleToggleScheduleDetailsModal}
                          >
                            View Details
                          </button>
                        </div>

                        <Image
                          src={
                            appointment.status === "Upcoming"
                              ? "/images/verify-border.svg"
                              : "/images/verify-3.svg"
                          }
                          className="position-absolute top-50 start-0 translate-middle bg-white -po-left-26"
                          alt="verify"
                          width={24}
                          height={24}
                        />
                      </div>
                      <Image
                        src="/images/shape-14.png"
                        className="position-absolute top-0 end-0 start-0 mx-auto"
                        alt="shape"
                        width={124}
                        height={35}
                      />
                    </div>
                  ))}
                </div>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>

      {/* Add A Schedule Modal */}
      <div className={`custom-modal center ${isScheduleModal ? "" : "show"}`}>
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Add A Schedule</h3>

            <div className="close-link" onClick={handleToggleScheduleModal}>
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <Form>
              <Row>
                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Select Date</Form.Label>
                    <Form.Control type="date" className="text-dark" />
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Select Time</Form.Label>
                    <Form.Control type="time" className="text-dark" />
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Schedule Type</Form.Label>
                    <Form.Select
                      className="form-control text-dark"
                      aria-label="Default select example"
                    >
                      <option>Select</option>
                      <option defaultValue="0">Appointment with Patient</option>
                      <option defaultValue="1">Group Meeting</option>
                      <option defaultValue="2">Team Meeting</option>
                      <option defaultValue="3">Client Meeting</option>
                      <option defaultValue="4">Doctor Meeting</option>
                      <option defaultValue="5">Other</option>
                    </Form.Select>
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Patient Name</Form.Label>
                    <Form.Control
                      type="text"
                      className="text-dark"
                      placeholder="Jonathon Ronan"
                    />
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Set Alarm</Form.Label>
                    <Form.Control type="time" className="text-dark" />
                  </Form.Group>
                </Col>

                <Col sm={12}>
                  <Form.Group className="mb-4">
                    <Form.Label className="label">Patient Avatar</Form.Label>
                    <Form.Control type="file" className="text-dark" />
                  </Form.Group>
                </Col>
              </Row>

              <Form.Group className="d-flex gap-3">
                <Button
                  variant="primary"
                  type="submit"
                  className="text-white fw-semibold py-2 px-2 px-sm-3"
                >
                  <span className="py-sm-1 d-block">
                    <i className="ri-add-line text-white"></i>{" "}
                    <span>Create Task</span>
                  </span>
                </Button>
              </Form.Group>
            </Form>
          </div>
        </div>

        <div
          className="close-outside"
          onClick={handleToggleScheduleModal}
        ></div>
      </div>

      {/* Schedule Details Modal */}
      <div
        className={`custom-modal center ${
          isScheduleDetailsModal ? "" : "show"
        }`}
      >
        <div className="custom-modal-content position-relative z-3">
          <div className="border-bottom py-3 px-4 d-flex align-items-center justify-content-between">
            <h3 className="fs-18 mb-0">Schedule Details</h3>

            <div
              className="close-link"
              onClick={handleToggleScheduleDetailsModal}
            >
              <span className="material-symbols-outlined">close</span>
            </div>
          </div>

          <div className="p-4">
            <div className="mb-4">
              <span className="d-block mb-1">Date</span>
              <span className="fs-16 fw-medium text-secondary d-block">
                07 Nov, 2024
              </span>
            </div>

            <div className="mb-4">
              <span className="d-block mb-1">Time</span>
              <span className="fs-28 fw-900 text-secondary d-block">10:00</span>
            </div>

            <div className="mb-4">
              <span className="d-block mb-1">Schedule Description</span>
              <span className="fs-16 fw-medium text-secondary d-block">
                Appointment with Patient
              </span>
            </div>

            <div className="mb-4">
              <span className="d-block mb-1">Patient Name</span>
              <div className="d-flex align-items-center">
                <Image
                  src="/images/user-83.png"
                  className="rounded-circle border border-2 border-white"
                  alt="user"
                  width={26}
                  height={26}
                />
                <span className="fs-14 fw-semibold text-secondary ms-2">
                  Jessy Pinkman
                </span>
              </div>
            </div>
            
            <div>
              <span className="d-block mb-1">Schedule Status</span>
              <div>
                <span className="bg-success bg-opacity-10 border border-success text-success-50 d-inline-block px-2 rounded-pill">
                  Completed
                </span>
              </div>
            </div>
          </div>
        </div>

        <div
          className="close-outside"
          onClick={handleToggleScheduleDetailsModal}
        ></div>
      </div>
    </>
  );
};

export default Appointments;
