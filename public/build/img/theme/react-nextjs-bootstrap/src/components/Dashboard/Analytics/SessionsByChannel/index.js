"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const SessionsByChannel = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [976, 651, 818, 459, 320, 209];

  const options = {
    labels: [
      "Email",
      "Organic Search",
      "Direct Browse",
      "Paid Search",
      "Social",
      "Referral",
    ],
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
        width: 9,
        height: 9,
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
            show: true,
            name: {
              color: "#64748B",
            },
            value: {
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
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
            <h3 className="mb-0">Sessions by Channel</h3>

            <Form.Select className="form-select month-select form-control p-0 h-auto border-0 pe-4 w-auto">
              <option defaultValue="0">Last 30 Days</option>
              <option defaultValue="1">Last 60 Days</option>
              <option defaultValue="2">
                Last 90 Days
              </option>
            </Form.Select>
          </div>

          <div
            style={{
              marginTop: "-10px",
              marginBottom: "10px",
            }}
            className="t-chart"
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="donut"
                height={295}
              />
            )}
          </div>

          <div className="d-flex justify-content-center flex-wrap gap-3 gap-lg-4">
            <div>
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-primary rounded-1 me-1"></span>
                <span>Email</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">976</h4>
            </div>

            <div>
              <div className="d-flex align-items-center">
                <span
                  className="wh-11 rounded-1 me-1"
                  style={{ backgroundColor: '#3584FC' }}
                ></span>
                <span>Organic Search</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">651</h4>
            </div>

            <div>
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-primary-div rounded-1 me-1"></span>
                <span>Direct Browse</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">818</h4>
            </div>

            <div>
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-info rounded-1 me-1"></span>
                <span>Paid Search</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">459</h4>
            </div>

            <div>
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-success rounded-1 me-1"></span>
                <span>Social</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">320</h4>
            </div>

            <div>
              <div className="d-flex align-items-center">
                <span className="wh-11 bg-danger rounded-1 me-1"></span>
                <span>Referral</span>
              </div>
              <h4 className="fs-18 fw-medium mb-0 mt-1 ps-3">209</h4>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default SessionsByChannel;
