"use client";

import React, { useState } from "react";
import { Card, Row, Col, Form } from "react-bootstrap";
import Image from "next/image";
import TotalCalls from "./TotalCalls";
import AnsweredCalls from "./AnsweredCalls";
import MissedCalls from "./MissedCalls";

const Overview = () => {
  const [activeTab, setActiveTab] = useState(0);

  const handleTabClick = (index) => {
    setActiveTab(index);
  };

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
            <h3 className="mb-0 fw-semibold">Overview</h3>

            <Form.Select className="month-select form-control w-135 bg-border-color border-color bg-transparent">
              <option>This Year</option>
              <option value="1">This Week</option>
              <option value="2">This Month</option>
            </Form.Select>
          </div>

          <Row className="justify-content-center">
            <Col sm={6} md={4}>
              <div
                onClick={() => handleTabClick(0)}
                className={`cco-tab-btn border-0 rounded-3 p-3 mb-4 ${
                  activeTab === 0 ? "bg-primary active" : "bg-ecf0ff"
                }`}
              >
                <div className="d-flex align-items-center mb-3">
                  <div className="flex-grow-1 me-3">
                    <span className="text-body d-block mb-1">Total Calls</span>
                    <h3 className="fs-24 fw-semibold text-secondary">26,435</h3>
                  </div>

                  <div className="flex-shrink-0">
                    <Image
                      src="/images/call5.svg"
                      alt="total-calls"
                      width={32}
                      height={32}
                    />
                    <Image
                      src="/images/call4.svg"
                      alt="total-calls"
                      width={32}
                      height={32}
                      className="hidden"
                    />
                  </div>
                </div>
                <span className="d-flex align-items-center align-items-center text-body">
                  <i className="material-symbols-outlined fs-18 pe-2 position-relative top-1 text-success">
                    trending_up
                  </i>
                  <span className="fw-medium me-1 text-secondary">+15%</span> last
                  year
                </span>
              </div>
            </Col>

            <Col sm={6} md={4}>
              <div
                onClick={() => handleTabClick(1)}
                className={`cco-tab-btn border-0 rounded-3 p-3 mb-4 ${
                  activeTab === 1 ? "bg-primary-div active" : "bg-faf5ff"
                }`}
              >
                <div className="d-flex align-items-center mb-3">
                  <div className="flex-grow-1 me-3">
                    <span className="text-body d-block mb-1">
                      Answered Calls
                    </span>
                    <h3 className="fs-24 fw-semibold text-secondary">18,520</h3>
                  </div>

                  <div className="flex-shrink-0">
                    <Image
                      src="/images/call3.svg"
                      alt="answered-calls"
                      width={32}
                      height={32}
                    />
                    <Image
                      src="/images/call6.svg"
                      alt="answered-calls"
                      width={32}
                      height={32}
                      className="hidden"
                    />
                  </div>
                </div>
                <span className="d-flex align-items-center align-items-center text-body">
                  <i className="material-symbols-outlined fs-18 pe-2 position-relative top-1 text-success">
                    trending_up
                  </i>
                  <span className="fw-medium me-1 text-secondary">+15%</span>{" "}
                  last year
                </span>
              </div>
            </Col>

            <Col sm={6} md={4}>
              <div
                onClick={() => handleTabClick(2)}
                className={`cco-tab-btn border-0 rounded-3 p-3 mb-4 ${
                  activeTab === 2 ? "bg-danger active" : "bg-fff5ed"
                }`}
              >
                <div className="d-flex align-items-center mb-3">
                  <div className="flex-grow-1 me-3">
                    <span className="text-body d-block mb-1">Missed Calls</span>
                    <h3 className="fs-24 fw-semibold text-secondary">3,735</h3>
                  </div>

                  <div className="flex-shrink-0">
                    <Image
                      src="/images/call7.svg"
                      alt="missed-calls"
                      width={32}
                      height={32}
                    />
                    <Image
                      src="/images/call8.svg"
                      alt="missed-calls"
                      width={32}
                      height={32}
                      className="hidden"
                    />
                  </div>
                </div>
                <span className="d-flex align-items-center align-items-center text-body">
                  <i className="material-symbols-outlined fs-18 pe-2 position-relative top-1 text-danger-50">
                    trending_down
                  </i>
                  <span className="fw-medium me-1 text-secondary">-25%</span>{" "}
                  last year
                </span>
              </div>
            </Col>
          </Row>

          <div>
            {activeTab === 0 && <TotalCalls />}
            {activeTab === 1 && <AnsweredCalls />}
            {activeTab === 2 && <MissedCalls />}
          </div>
        </div>
      </Card>
    </>
  );
};

export default Overview;
