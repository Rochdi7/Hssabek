"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, Form } from "react-bootstrap";

const DeviceSessions = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [55, 44, 30, 12];

  const options = {
    labels: ["Desktop", "Mobile", "Tablet", "Other"],
    colors: ["#37D80A", "#605DFF", "#AD63F6", "#FD5812"],
    dataLabels: {
      enabled: false,
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
      },
    },
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
      fontSize: "12px",
      position: "bottom",
      horizontalAlign: "center",
      itemMargin: {
        horizontal: 8,
        vertical: 7,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        radius: 2,
        height: 9,
        offsetX: -2,
        offsetY: -0.1,
        shape: "diamond",
      },
    },
    tooltip: {
      enabled: true,
      y: {
        formatter: function (val) {
          return val + "%";
        },
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
            <h3 className="mb-0">Device Sessions</h3>

            <Form.Select className="form-select month-select form-control p-0 h-auto border-0 pe-4 w-auto">
              <option defaultValue="0">Last Week</option>
              <option defaultValue="1">Last Month</option>
              <option defaultValue="2">
                Last Year
              </option>
            </Form.Select>
          </div>

          <Row className="align-items-center">
            <Col sm={5} className="t-chart">
              {Chart && (
                <Chart
                  options={options}
                  series={series}
                  type="pie"
                  height={200}
                />
              )}
            </Col>

            <Col sm={7}>
              <ul className="ps-0 mb-0 list-unstyled ms-plus-21 border-top pt-1">
                <li className="d-flex justify-content-between align-items-center border-bottom pb-1 mb-1">
                  <div className="d-flex align-items-center">
                    <span
                      className="d-inline-block bg-success rounded-circle"
                      style={{ width: "10px", height: "10px" }}
                    ></span>
                    <div className="ps-3">
                      <span className="fs-12 text-secondary d-block mb-1">
                        Desktop
                      </span>
                      <h4 className="fw-semibold fs-16 mb-0">45.2%</h4>
                    </div>
                  </div>
                  <div>
                    <span className="text-body d-block mb-1 fs-12">
                      Sessions
                    </span>
                    <h4 className="text-body mb-0 fw-semibold">8,732</h4>
                  </div>
                </li>

                <li className="d-flex justify-content-between align-items-center border-bottom pb-1 mb-1">
                  <div className="d-flex align-items-center">
                    <span
                      className="d-inline-block bg-primary rounded-circle"
                      style={{ width: "10px", height: "10px" }}
                    ></span>
                    <div className="ps-3">
                      <span className="fs-12 text-secondary d-block mb-1">
                        Mobile
                      </span>
                      <h4 className="fw-semibold fs-16 mb-0">48.7%</h4>
                    </div>
                  </div>
                  <div>
                    <span className="text-body d-block mb-1 fs-12">
                      Sessions
                    </span>
                    <h4 className="text-body mb-0 fw-semibold">9,416</h4>
                  </div>
                </li>

                <li className="d-flex justify-content-between align-items-center border-bottom pb-1 mb-1">
                  <div className="d-flex align-items-center">
                    <span
                      className="d-inline-block bg-primary-div rounded-circle"
                      style={{ width: "10px", height: "10px" }}
                    ></span>
                    <div className="ps-3">
                      <span className="fs-12 text-secondary d-block mb-1">
                        Tablet
                      </span>
                      <h4 className="fw-semibold fs-16 mb-0">32.3%</h4>
                    </div>
                  </div>
                  <div>
                    <span className="text-body d-block mb-1 fs-12">
                      Sessions
                    </span>
                    <h4 className="text-body mb-0 fw-semibold">1,042</h4>
                  </div>
                </li>

                <li className="d-flex justify-content-between align-items-center border-bottom pb-1 mb-1">
                  <div className="d-flex align-items-center">
                    <span
                      className="d-inline-block bg-danger rounded-circle"
                      style={{ width: "10px", height: "10px" }}
                    ></span>
                    <div className="ps-3">
                      <span className="fs-12 text-secondary d-block mb-1">
                        Other
                      </span>
                      <h4 className="fw-semibold fs-16 mb-0">45.2%</h4>
                    </div>
                  </div>
                  <div>
                    <span className="text-body d-block mb-1 fs-12">
                      Sessions
                    </span>
                    <h4 className="text-body mb-0 fw-semibold">135</h4>
                  </div>
                </li>
              </ul>
            </Col>
          </Row>

          <p className="fs-12 lh-16 mt-3 pt-2">
            This data helps you understand which devices are most commonly used
            and how engagement metrics vary between them.
          </p>
        </Card.Body>
      </Card>
    </>
  );
};

export default DeviceSessions;
