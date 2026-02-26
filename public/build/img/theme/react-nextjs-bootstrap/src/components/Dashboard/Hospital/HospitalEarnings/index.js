"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, Form } from "react-bootstrap";
import Image from "next/image";

const HospitalEarnings = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Earnings",
      data: [3, 7, 7, 10, 9, 11, 20],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    colors: ["#3584FC"],
    dataLabels: {
      enabled: false,
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    stroke: {
      curve: "straight",
      width: 1,
    },
    xaxis: {
      categories: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      labels: {
        show: false,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      show: false,
      labels: {
        formatter: (val) => {
          return "$" + val + "k";
        },
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: false,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: false,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card
        className="border-0 rounded-3 mb-4"
        style={{ backgroundColor: "#FFF5ED" }}
      >
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Hospital Earnings</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0 w-90 bg-transparent"
              aria-label="Default select example"
            >
              <option defaultValue="0">This Week</option>
              <option defaultValue="1">Last Month</option>
              <option defaultValue="2">Last Year</option>
            </Form.Select>
          </div>

          <Row className="align-items-center">
            <Col lg={5}>
              <div className="hospital-img pt-3 pb-4 text-center">
                <Image
                  src="/images/hospital.png"
                  alt="hospital"
                  width={280}
                  height={280}
                />
              </div>
            </Col>

            <Col lg={7}>
              <Row>
                <Col sm={6} xl={12} xxl={6}>
                  <Card className="bg-white p-4 border-0 rounded-3 mb-4 exchange-for-dark">
                    <h2 className="fs-24 fw-medium mb-1">$120,000</h2>
                    <p className="fs-12 mb-0">
                      Total Profit{" "}
                      <span className="text-danger ms-1">
                        {" "}
                        <i className="ri-arrow-down-fill"></i>5%
                      </span>
                    </p>
                  </Card>
                </Col>

                <Col sm={6} xl={12} xxl={6}>
                  <Card className="bg-white p-4 border-0 rounded-3 mb-4 exchange-for-dark">
                    <h2 className="fs-24 fw-medium mb-1">$80,000</h2>
                    <p className="fs-12 mb-0">
                      Total Costs{" "}
                      <span className="text-success ms-1">
                        {" "}
                        <i className="ri-arrow-up-fill"></i>3%
                      </span>
                    </p>
                  </Card>
                </Col>

                <Col sm={12}>
                  <div className="position-relative">
                    <Card className="bg-white p-4 border-0 rounded-3 mb-0 exchange-for-dark">
                      <Row className="align-items-center">
                        <Col lg={7}>
                          <h2 className="fs-24 fw-medium mb-1">$900,000</h2>
                          <p className="fs-12 mb-0">
                            Total Earnings{" "}
                            <span className="text-success ms-1">
                              {" "}
                              <i className="ri-arrow-up-fill"></i>3%
                            </span>
                          </p>
                        </Col>

                        <Col lg={5}>
                          <div style={{ margin: "-30px -10px -30px 0" }}>
                            {Chart && (
                              <Chart
                                options={options}
                                series={series}
                                type="area"
                                height={95}
                              />
                            )}
                          </div>
                        </Col>
                      </Row>
                    </Card>

                    <div className="bg-white bg-opacity-75 p-2 p-md-3 mx-3 mx-md-5 rounded-bottom-3 exchange-for-dark"></div>
                  </div>
                </Col>
              </Row>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default HospitalEarnings;
