"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, Form } from "react-bootstrap";

const LeadsBySource = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [320, 60, 30, 160, 279, 19];

  const options = {
    labels: ["Organic", "Paid", "Direct", "Social", "Referrals", "Others"],
    colors: ["#605DFF", "#3584FC", "#AD63F6", "#0dcaf0", "#25B003", "#FD5812"],
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: false,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "center",
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
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          labels: {
            show: true,
            name: {
              color: "#64748B",
            },
            defaultValue: {
              show: true,
              color: "#3A4252",
              fontSize: "28px",
              fontWeight: "600",
            },
            total: {
              show: true,
              color: "#64748B",
            },
          },
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: false,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Leads by Source</h3>

            <Form.Select
              className="month-select form-control"
              aria-label="Default select example"
            >
              <option defaultValue="0">Select</option>
              <option defaultValue="1">Today</option>
              <option defaultValue="2">Weekly</option>
              <option defaultValue="3">Monthly</option>
              <option defaultValue="4">Yearly</option>
            </Form.Select>
          </div>

          <div
            style={{ 
              marginTop: "-10px",
            }}
            className="t-chart"
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="donut"
                height={248}
              />
            )}
          </div>

          <Row className="justify-content-center">
            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-primary rounded-1 me-1"></span>
                <span>Organic</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">320</h4>
            </Col>

            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span
                  className="wh-11 rounded-1 me-1"
                  style={{ backgroundColor: '#3584FC' }}
                ></span>
                <span>Paid</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">60</h4>
            </Col>

            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-primary-div rounded-1 me-1"></span>
                <span>Direct</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">30</h4>
            </Col>

            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-info rounded-1 me-1"></span>
                <span>Social</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">160</h4>
            </Col>

            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-success rounded-1 me-1"></span>
                <span>Referrals</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">279</h4>
            </Col>

            <Col xs={12} md={2} lg={4} className="col mt-4">
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-danger rounded-1 me-1"></span>
                <span>Others</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1">19</h4>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default LeadsBySource;
