"use client";

import React, { useEffect, useState } from "react";
import { Card, Row, Col } from "react-bootstrap";

const PropertiesForRent = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [35];

  const options = {
    colors: ["#605DFF"],
    plotOptions: {
      radialBar: {
        hollow: {
          margin: 0,
          size: "35%",
          background: "#F5F7F8",
          margin: 10,
        },
        track: {
          background: "#F5F7F8",
        },
        dataLabels: {
          name: {
            offsetY: -10,
            color: "#4b9bfa",
            fontSize: ".625rem",
            show: false,
          },
          value: {
            show: true,
            offsetY: 5,
            color: "#3A4252",
            fontSize: "14px",
            fontWeight: 700,
            fontFamily: "Inter",
          },
        },
      },
    },
    stroke: {
      lineCap: "0",
    },
    labels: ["Status"],
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center mb-4">
            <span className="d-inline-block border-success border bg-success bg-opacity-10 text-success rounded-pill fs-12 fw-medium px-2">
              + 35%
            </span>
            <span className="fs-12">Last 30 days</span>
          </div>

          <Row className="align-items-end">
            <Col sm={6}>
              <span className="d-block mb-2">Properties for Rent</span>
              <h3 className="mb-0 fs-20 mb-0">2,510</h3>
            </Col>

            <Col sm={6}>
              <div style={{ margin: "-36px 0 -36px 0" }}>
                <div className="mt-4 mt-sm-0">
                  {Chart && (
                    <Chart
                      options={options}
                      series={series}
                      type="radialBar"
                      height={170}
                    />
                  )}
                </div>
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default PropertiesForRent;
