"use client";

import { Card, Row, Col } from "react-bootstrap"; 

const CustomerVisit = () => {
  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <h3 className="mb-4">Customer Visit</h3>

        <div className="position-relative">
          <Row>
            <Col className="pe-0">
              <div
                className="text-center wh-25 lh-25 rounded-circle mb-2"
                style={{
                  backgroundColor: "#F6F7F9",
                }}
              >
                <i className="ri-user-3-fill"></i>
              </div>
              <span
                className="d-inline-block mb-2"
                style={{ maxWidth: "65px" }}
              >
                Walk-In Customer
              </span>
              <h3 className="fs-28 mb-2">1.5K</h3>
              <span className="d-inline-block bg-success bg-opacity-10 border-success border px-2 rounded-pill text-success fs-12 fw-medium">
                +7%
              </span>
            </Col>

            <Col className="ps-0 text-end border-start">
              <div
                className="text-center wh-25 lh-25 rounded-circle mb-2 ms-auto"
                style={{
                  backgroundColor: "#F6F7F9",
                }}
              >
                <i className="ri-user-received-2-fill"></i>
              </div>
              <span
                className="d-inline-block mb-2"
                style={{ maxWidth: "65px" }}
              >
                Repeat Customer
              </span>
              <h3 className="fs-28 mb-2">2.1K</h3>
              <span className="d-inline-block bg-danger bg-opacity-10 border-danger border px-2 rounded-pill text-danger fs-12 fw-medium">
                -1.4%
              </span>
            </Col>
          </Row>

          <div
            className="bg-primary bg-opacity-10 text-primary text-center rounded-circle position-absolute top-50 start-50 translate-middle"
            style={{
              width: "33px",
              height: "33px",
              lineHeight: "45px",
            }}
          >
            <span className="material-symbols-outlined">bolt</span>
          </div>
        </div>

        <div className="mt-4">
          <div
            className="progress bg-success rounded-pill"
            style={{
              height: "8px",
            }}
          >
            <div
              className="progress-bar bg-primary rounded-pill"
              style={{
                width: "32%",
                height: "8px",
              }}
            ></div>
          </div>
          <div className="d-flex justify-content-between mt-1">
            <span className="fs-12">32%</span>
            <span className="fs-12">64%</span>
          </div>
        </div>
      </Card>
    </>
  );
};

export default CustomerVisit;
