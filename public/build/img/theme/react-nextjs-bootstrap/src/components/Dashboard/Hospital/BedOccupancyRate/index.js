"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card, Form } from "react-bootstrap";

const BedOccupancyRate = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [1275, 825, 450];

  const options = {
    labels: ["Total Beds", "Occupied Beds", "Available Beds"],
    colors: ["#1F64F1", "#BF85FB", "#37D80A"],
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
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          labels: {
            show: false,
            name: {
              color: "#64748B",
            },
            defaultValue: {
              show: true,
              color: "#3A4252",
              fontSize: "22px",
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
      enabled: true,
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <div>
              <h3 className="mb-0">Bed Occupancy Rate</h3>
              <p>Currently occupied vs. available.</p>
            </div>

            <Form.Select
              className="month-select form-control w-135"
              aria-label="Default select example"
            >
              <option defaultValue="0">Todays</option>
              <option defaultValue="1">Last 60 Days</option>
              <option defaultValue="2">Last 90 Days</option>
            </Form.Select>
          </div>

          <Row className="align-items-center">
            <Col sm={6}>
              <div className="d-flex align-items-center welcome-status-item mb-4">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined icon-bg bg-primary bg-opacity-25 text-primary">
                    airplay
                  </span>
                </div>
                <div className="flex-grow-1 ms-3">
                  <h5 className="mb-0 fs-18">1,275</h5>
                  <p>Total Beds</p>
                </div>
              </div>

              <div className="d-flex align-items-center welcome-status-item mb-4">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined icon-bg bg-primary-div bg-opacity-25 text-primary-div">
                    bed
                  </span>
                </div>
                <div className="flex-grow-1 ms-3">
                  <h5 className="mb-0 fs-18">825</h5>
                  <p>Occupied Beds</p>
                </div>
              </div>

              <div className="d-flex align-items-center welcome-status-item mb-0">
                <div className="flex-shrink-0">
                  <span className="material-symbols-outlined icon-bg bg-success bg-opacity-25 text-success">
                    featured_seasonal_and_gifts
                  </span>
                </div>
                <div className="flex-grow-1 ms-3">
                  <h5 className="mb-0 fs-18">450</h5>
                  <p>Available Beds</p>
                </div>
              </div>
            </Col>

            <Col sm={6} className="mt-3 mt-sm-0">
              <div className="text-center" style={{ marginTop: "-8px" }}>
                <div className="t-chart">
                  {Chart && (
                    <Chart
                      options={options}
                      series={series}
                      type="donut"
                      height={160}
                    />
                  )}
                </div>

                <p className="fs-12 lh-16">
                  The donut or pie chart representing the occupancy rate.
                </p>
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default BedOccupancyRate;
