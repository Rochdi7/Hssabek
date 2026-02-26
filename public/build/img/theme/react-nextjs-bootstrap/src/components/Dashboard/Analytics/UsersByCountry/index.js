"use client";

import React from "react";
import { Row, Col, Card, Form } from "react-bootstrap";
import Image from "next/image";
import WorldMapContent from "./WorldMapContent";

const UsersByCountry = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4 pb-0">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <h3 className="mb-0">Users by Country</h3>

            <Form.Select className="form-select month-select form-control p-0 h-auto border-0 pe-4 w-auto">
              <option defaultValue="0">Last Week</option>
              <option defaultValue="1">Last Month</option>
              <option defaultValue="2">Last Year</option>
            </Form.Select>
          </div>
 
          <div style={{ margin: '31px 0' }}>
            <WorldMapContent />
          </div>

          <Row>
            <Col sm={6}>
              <div className="d-flex mb-4">
                <div className="flex-shrink-0 position-relative top-1">
                  <Image
                    src="/images/united-states-2.png"
                    className="rounded-circle"
                    alt="united-states"
                    width={20}
                    height={20}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <span className="fs-12 fw-medium d-block mb-1">
                    United States
                  </span>
                  <h4 className="mb-0 fs-16 fw-semibold">
                    12,800 <span className="text-body fs-12">35.6%</span>
                  </h4>
                </div>
              </div>
            </Col>

            <Col sm={6}>
              <div className="d-flex mb-4">
                <div className="flex-shrink-0 position-relative top-1">
                  <Image
                    src="/images/united-kingdom-2.png"
                    className="rounded-circle"
                    alt="united-states"
                    width={20}
                    height={20}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <span className="fs-12 fw-medium d-block mb-1">
                    United Kingdom
                  </span>
                  <h4 className="mb-0 fs-16 fw-semibold">
                    6,750 <span className="text-body fs-12">18.7%</span>
                  </h4>
                </div>
              </div>
            </Col>

            <div className="col-12">
              <div className="border-bottom mb-4"></div>
            </div>

            <Col sm={6}>
              <div className="d-flex mb-4">
                <div className="flex-shrink-0 position-relative top-1">
                  <Image
                    src="/images/canada-2.png"
                    className="rounded-circle"
                    alt="canada"
                    width={20}
                    height={20}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <span className="fs-12 fw-medium d-block mb-1">Canada</span>
                  <h4 className="mb-0 fs-16 fw-semibold">
                    2,500 <span className="text-body fs-12">6.3%</span>
                  </h4>
                </div>
              </div>
            </Col>

            <Col sm={6}>
              <div className="d-flex mb-4">
                <div className="flex-shrink-0 position-relative top-1">
                  <Image
                    src="/images/australia.png"
                    className="rounded-circle"
                    alt="australia"
                    width={20}
                    height={20}
                  />
                </div>
                <div className="flex-grow-1 ms-2">
                  <span className="fs-12 fw-medium d-block mb-1">
                    Australia
                  </span>
                  <h4 className="mb-0 fs-16 fw-semibold">
                    2,200 <span className="text-body fs-12">5.4%</span>
                  </h4>
                </div>
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default UsersByCountry;
