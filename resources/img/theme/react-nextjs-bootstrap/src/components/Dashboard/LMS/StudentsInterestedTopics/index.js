"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const StudentsInterestedTopics = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Courses",
      data: [47, 69, 37, 17, 28, 40],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#605DFF"],
    plotOptions: {
      bar: {
        barHeight: "21px",
        horizontal: true,
      },
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
    },
    dataLabels: {
      enabled: false,
    },
    xaxis: {
      categories: [
        "UX/UI Design",
        "WordPress",
        "Motion Design",
        "Video Editing",
        "Angular",
        "Python",
      ],
      axisTicks: {
        show: true,
        color: "#ECEEF2",
      },
      axisBorder: {
        show: true,
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
      labels: {
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
            <h3 className="mb-0">Student&apos;s Interested Topics</h3>

            <Form.Select
              className="month-select form-control p-0 h-auto border-0"
              aria-label="Default select example"
            >
              <option defaultValue="0">This Day</option>
              <option defaultValue="1">This Weekly</option>
              <option defaultValue="2">This Monthly</option>
              <option defaultValue="3">This Yearly</option>
            </Form.Select>
          </div>

          <div
            style={{ 
              marginTop: "-25px",
              marginBottom: "-25px",
            }}
          >
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={450}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default StudentsInterestedTopics;
