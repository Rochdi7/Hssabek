"use client";

import React, { useEffect, useState } from "react";
import { Row, Col, Card } from "react-bootstrap";

const Clicks = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Clicks",
      data: [
        100, 130, 115, 170, 110, 120, 85, 140, 150, 100, 110, 90, 160, 125, 105,
        130, 145, 120, 150, 155, 220, 165,
      ],
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
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight",
      width: 2,
    },
    colors: ["#605DFF"],
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0.5,
        opacityTo: 0.9,
      },
    },
    xaxis: {
      categories: [
        "01 Jan",
        "02 Jan",
        "03 Jan",
        "04 Jan",
        "05 Jan",
        "06 Jan",
        "07 Jan",
        "08 Jan",
        "09 Jan",
        "10 Jan",
        "11 Jan",
        "12 Jan",
        "13 Jan",
        "14 Jan",
        "15 Jan",
        "16 Jan",
        "17 Jan",
        "18 Jan",
        "19 Jan",
        "20 Jan",
        "21 Jan",
        "22 Jan",
      ],
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
      tickAmount: 5,
      show: false,
      max: 250,
      min: 0,
      labels: {
        show: true,
        style: {
          colors: "#64748B",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#ECEEF2",
      },
      axisTicks: {
        show: true,
        color: "#ECEEF2",
      },
    },
    grid: {
      show: false,
      borderColor: "#ECEEF2",
    },
    legend: {
      show: true,
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box position-relative">
        <Card.Body className="p-4">
          <Row>
            <Col lg={6}>
              <span>Clicks</span>

              <div className="d-flex align-items-center mb-4">
                <h3 className="fs-20 mt-1 mb-0">4,500</h3>
                <span className="d-inline-block bg-success text-success bg-opacity-25 px-2 rounded-1 fs-12 fw-medium d-flex align-items-center ms-2">
                  <i className="ri-arrow-up-s-fill fs-20 lh-1 me-1"></i> 37.5%
                </span>
              </div>
              <span className="fs-12">Last 30 days</span>
            </Col>

            <Col lg={6}>
              <div className="chart-position" style={{ maxWidth: "160px" }}>
                {Chart && (
                  <Chart
                    options={options}
                    series={series}
                    type="area"
                    height={150}
                  />
                )}
              </div>
            </Col>
          </Row>
        </Card.Body>
      </Card>
    </>
  );
};

export default Clicks;
