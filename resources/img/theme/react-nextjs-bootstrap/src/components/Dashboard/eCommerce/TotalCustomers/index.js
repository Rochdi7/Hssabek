"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TotalCustomers = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Orders",
      data: [55, 50, 60, 45, 85, 80, 100],
    },
    {
      name: "Sales",
      data: [45, 38, 80, 65, 55, 75, 90],
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
    colors: ["#605DFF", "#C2CDFF"],
    stroke: {
      width: 2,
      curve: "straight",
    },
    grid: {
      show: true,
      borderColor: "#ffffff",
    },
    xaxis: {
      categories: [
        "01 Jun",
        "02 Jun",
        "03 Jun",
        "04 Jun",
        "05 Jun",
        "06 Jun",
        "07 Jun",
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
      show: false,
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
    legend: {
      show: false,
      fontSize: "12px",
      position: "bottom",
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
        offsetX: -2,
        offsetY: -0.5,
      },
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 stats-box">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between flex-wrap gap-2">
            <div>
              <div className="d-flex">
                <span>Total Customers</span>
                <span className="count up">+5.4</span>
              </div>
              <h3 className="fs-20 mt-1 mb-0">1,528</h3>
            </div>
            <span className="fs-12">Last 7 days</span>
          </div>

          <div
            style={{
              maxWidth: "290px",
              marginLeft: "auto",
              marginRight: "auto",
              marginBottom: "-19px",
              marginTop: "-32px",
            }}
          >
            {Chart && (
              <Chart options={options} series={series} type="line" height={140} />
            )}
          </div>

          <div className="d-flex justify-content-between flex-wrap gap-2">
            <span className="fs-12">1 June</span>
            <span className="fs-12">7 June</span>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TotalCustomers;
