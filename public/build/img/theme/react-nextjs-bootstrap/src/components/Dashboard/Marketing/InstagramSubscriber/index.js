"use client";

import React, { useEffect, useState } from "react";
import { Dropdown, Card } from "react-bootstrap";

const InstagramSubscriber = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Gained",
      data: [44, 60, 41, 67, 22, 43, 13, 30, 20, 8],
    },
    {
      name: "Lost",
      data: [13, 30, 20, 8, 13, 27, 44, 60, 41, 67],
    },
  ];

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
      zoom: {
        enabled: true,
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 5,
        horizontal: false,
        columnWidth: "28px",
        borderRadiusApplication: "end",
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF", "#9CAAFF", "#DDE4FF"],
    xaxis: {
      categories: [
        "Oct 01",
        "Oct 02",
        "Oct 03",
        "Oct 04",
        "Oct 05",
        "Oct 06",
        "Oct 07",
        "Oct 07",
        "Oct 08",
        "Oct 09",
      ],
      axisTicks: {
        show: false,
        color: "#8695AA",
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
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
      max: 125,
      min: 0,
      labels: {
        formatter: (val) => {
          return "" + val + "K";
        },
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: true,
      position: "bottom",
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
    fill: {
      opacity: 1,
    },
    grid: {
      show: true,
      strokeDashArray: 0,
      borderColor: "#ECF0FF",
    },
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-4">
            <h3 className="mb-0">Instagram Subscriber</h3>

            <Dropdown className="action-opt">
              <Dropdown.Toggle
                variant="secondary"
                id="dropdown-basic"
                className="bg-transparent p-0"
              >
                <span className="material-symbols-outlined fs-22">
                  more_horiz
                </span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="bg-white border box-shadow">
                <Dropdown.Item href="#">This Day</Dropdown.Item>

                <Dropdown.Item href="#">This Week</Dropdown.Item>

                <Dropdown.Item href="#">This Month</Dropdown.Item>

                <Dropdown.Item href="#">This Year</Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
          </div>

          <div style={{ margin: "-25px -28px -16px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={389}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default InstagramSubscriber;
