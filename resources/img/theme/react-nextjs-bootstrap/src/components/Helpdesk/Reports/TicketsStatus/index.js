"use client";

import React, { useEffect, useState } from "react";
import { Container, Row, Col, Card, Form } from "react-bootstrap";

const TicketsStatus = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Solved",
      data: [28, 50, 90, 95, 20, 70, 35],
    },
    {
      name: "In Progress",
      data: [80, 60, 70, 30, 45, 20, 80],
    },
    {
      name: "Pending",
      data: [32, 23, 78, 35, 65, 35, 15],
    },
    {
      name: "Others",
      data: [60, 25, 80, 25, 15, 40, 15],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },

    colors: ["#605DFF", "#3584FC", "#AD63F6", "#FD5812"],
    plotOptions: {
      bar: {
        columnWidth: "65%",
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    stroke: {
      width: 3,
      show: true,
      colors: ["transparent"],
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
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 100,
      min: 0,
      labels: {
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
    tooltip: {
      y: {
        formatter: function (val) {
          return val + " Tickets";
        },
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
        shape: 'diamond',
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
      },
    },
  };

  return (
    <>
      <Row className="mb-4">
        <Col
          xs={12}
          sm={8}
          md={8}
          lg={12}
          xl={12}
          xxl={8}
          className="pe-sm-0 custom-p1 custom-xxxl-10"
        >
          <Card className="bg-white border-0 rounded-3 rounded-end-0 position-relative">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
                <h3 className="mb-0">Tickets Status</h3>

                <Form.Select
                  className="month-select form-control p-0 h-auto border-0 w-90 d-sm-none"
                  aria-label="Default select example"
                >
                  <option value="0">Select</option>
                  <option value="1">This Day</option>
                  <option value="2">This Week</option>
                  <option value="3">This Month</option>
                  <option value="4">This Year</option>
                </Form.Select>
              </div>

              <div
                style={{
                  marginLeft: "-15px",
                  marginTop: "-20px",
                  marginBottom: "-22px",
                }}
              >
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="bar"
                    height={440}
                  />
                )}
              </div>
            </Card.Body>
          </Card>
        </Col>

        <Col
          xs={12}
          sm={4}
          md={4}
          lg={12}
          xl={12}
          xxl={4}
          className="ps-sm-0 custom-p2 custom-xxxl-2"
        >
          <Card className="bg-white border-0 rounded-3 rounded-start-0 position-relative border-start h-100">
            <Card.Body className="p-4">
              <div className="d-flex justify-content-end mb-3 mb-lg-4 d-none d-sm-flex">
                <Form.Select
                  className="month-select form-control p-0 h-auto border-0 w-90"
                  aria-label="Default select example"
                >
                  <option value="0">Select</option>
                  <option value="1">This Day</option>
                  <option value="2">This Week</option>
                  <option value="3">This Month</option>
                  <option value="4">This Year</option>
                </Form.Select>
              </div>

              <h4 className="fw-normal fs-18 mb-1">Avg. 1.5k</h4>

              <p className="mb-4">Tickets Weekly Solved</p>

              <div className="d-flex d-sm-block d-lg-flex d-xxl-block justify-content-between flex-wrap gap-2">
                <div className="mb-3 pb-md-1">
                  <div className="mb-1 d-flex align-items-center gap-1">
                    <span className="wh-11 bg-primary rounded-1 d-inline-block position-relative top-1"></span>
                    <span>Solved</span>
                  </div>
                  <h4 className="fw-medium fs-18 mb-1">1.5k</h4>
                </div>

                <div className="mb-3 pb-md-1">
                  <div className="mb-1 d-flex align-items-center gap-1">
                    <span className="wh-11 bg-primary rounded-1 d-inline-block position-relative top-1"></span>
                    <span>In Progress</span>
                  </div>
                  <h4 className="fw-medium fs-18 mb-1">4.7k</h4>
                </div>

                <div className="mb-3 pb-md-1">
                  <div className="mb-1 d-flex align-items-center gap-1">
                    <span className="wh-11 bg-primary-div rounded-1 d-inline-block position-relative top-1"></span>
                    <span>Pending</span>
                  </div>
                  <h4 className="fw-medium fs-18 mb-1">780</h4>
                </div>

                <div>
                  <div className="mb-1 d-flex align-items-center gap-1">
                    <span className="wh-11 bg-danger rounded-1 d-inline-block position-relative top-1"></span>
                    <span>Others</span>
                  </div>
                  <h4 className="fw-medium fs-18 mb-1">320</h4>
                </div>
              </div>
            </Card.Body>
          </Card>
        </Col>
      </Row>
    </>
  );
};

export default TicketsStatus;
