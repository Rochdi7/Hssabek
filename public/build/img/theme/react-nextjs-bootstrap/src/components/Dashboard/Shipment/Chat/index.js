"use client";

import { Card, Form, Button, Dropdown } from "react-bootstrap";
import Image from "next/image";

const Chat = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Chat</h3>

            <Dropdown className="action-opt text-center">
              <Dropdown.Toggle className="btn bg-transparent p-0">
                <i className="ri-more-fill"></i>
              </Dropdown.Toggle>
              <Dropdown.Menu className="bg-white border-0 box-shadow">
                <Dropdown.Item>
                  <i className="ri-pie-chart-line"></i> Today
                </Dropdown.Item>
                <Dropdown.Item>
                  <i className="ri-restart-line"></i> Last 7 Days
                </Dropdown.Item>
                <Dropdown.Item>
                  <i className="ri-restart-line"></i> Last Month
                </Dropdown.Item>
                <Dropdown.Item>
                  <i className="ri-calendar-2-line"></i> Last 1 Year
                </Dropdown.Item>
                <Dropdown.Item>
                  <i className="ri-eye-line"></i> View
                </Dropdown.Item>
                <Dropdown.Item>
                  <i className="ri-delete-bin-6-line"></i> Delete
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <ul
            className="ps-0 mb-0 list-unstyled overflow-y-auto"
            style={{ height: "240px" }}
            data-simplebar
          >
            <li className="mb-3">
              <div className="d-flex align-items-center mb-2">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-62.jpg"
                    className="rounded-circle"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <h4 className="fw-medium fs-16 mb-0">Irene George</h4>
                  <span className="fs-12">05:30PM</span>
                </div>
              </div>
              <p style={{ maxWidth: "310px" }}>
                Hey, have you finished the report for the project yet?
              </p>
            </li>

            <li className="text-end">
              <div className="d-flex align-items-center mb-3">
                <div className="flex-grow-1 me-2">
                  <h4 className="fw-medium fs-16 mb-0">Virgil Martin</h4>
                  <span className="fs-12">05:30PM</span>
                </div>
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-63.jpg"
                    className="rounded-circle"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>
              <p
                className="bg-danger bg-opacity-10 p-2 rounded-2 ms-auto"
                style={{ maxWidth: "310px" }}
              >
                Almost! I just need to double-check some data. I’ll send it over
                in about an hour.
              </p>
            </li>

            <li className="mb-3">
              <div className="d-flex align-items-center mb-2">
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-64.jpg"
                    className="rounded-circle"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <h4 className="fw-medium fs-16 mb-0">Alex Dew</h4>
                  <span className="fs-12">05:30PM</span>
                </div>
              </div>
              <p style={{ maxWidth: "310px" }}>
                Hey, have you finished the report for the project yet?
              </p>
            </li>

            <li className="text-end">
              <div className="d-flex align-items-center mb-3">
                <div className="flex-grow-1 me-2">
                  <h4 className="fw-medium fs-16 mb-0">Heriy Smith</h4>
                  <span className="fs-12">05:30PM</span>
                </div>
                <div className="flex-shrink-0">
                  <Image
                    src="/images/user-65.jpg"
                    className="rounded-circle"
                    alt="user"
                    width={40}
                    height={40}
                  />
                </div>
              </div>
              <p
                className="bg-danger bg-opacity-10 p-2 rounded-2 ms-auto"
                style={{ maxWidth: "310px" }}
              >
                Almost! I just need to double-check some data. I’ll send it over
                in about an hour.
              </p>
            </li>
          </ul>

          <Form className="position-relative mt-3 for-rtl-form">
            <Form.Control
              type="text"
              className="bg-body-bg border-0"
              style={{ height: "35px", paddingLeft: "40px" }}
              placeholder="Write your message..."
            />
            <div className="d-flex gap-2 align-items-center position-absolute top-50 end-0 translate-middle-y pe-3 bg-body-bg">
              <Button className="border-0 p-0 bg-transparent">
                <i className="ri-emotion-happy-line fs-16 text-body"></i>
              </Button>
              <Button type="submit" className="border-0 p-0 bg-transparent">
                <i className="ri-send-plane-2-line fs-16 text-body"></i>
              </Button>
            </div>
            <i className="attachment-icon ri-attachment-2 fs-16 position-absolute top-50 start-0 translate-middle-y ps-3"></i>
          </Form>
        </Card.Body>
      </Card>
    </>
  );
};

export default Chat;
